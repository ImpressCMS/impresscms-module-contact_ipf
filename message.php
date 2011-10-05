<?php
/**
* Message page
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

/**
 * Edit a Message
 *
 * @param int $message_id Messageid to be edited
*/
function editmessage($clean_message_id = 0) {
	global $icmsConfig, $icmsConfigCaptcha, $xoopsUser, $contact_message_handler, $icmsModule,
		$icmsTpl;
	
	$module = icms::handler("icms_module")->getByDirname(basename(dirname(__FILE__)), TRUE);

	$messageObj = $contact_message_handler->get($clean_message_id);

	if ($messageObj->isNew()) {
		$sform = $messageObj->getSecureForm(_CO_CONTACT_MESSAGE_CREATE, 'addmessage');
		// add captcha, if required
		if ($module->config['use_captcha'] == true) {
			$sform->addElement(new icms_form_elements_Captcha(_SECURITYIMAGE_GETCODE, 'scode'));
		}
		$sform->assign($icmsTpl, 'contact_messageform');
	} else {
		exit;
	}
}

include_once 'header.php';

$xoopsOption['template_main'] = 'contact_message.html';

include_once ICMS_ROOT_PATH . '/header.php';

global $xoopsUser;

$module = icms::handler("icms_module")->getByDirname(basename(dirname(__FILE__)), TRUE);

$dirty_op = $clean_op = '';
$clean_message_id = 0;
$valid_op = array ('mod', 'addmessage','confirmsent', '');
$contact_message_handler = icms_getModuleHandler('message', basename(dirname(__FILE__)), 'contact');

// check the option
if (isset($_GET['op'])) $dirty_op = trim($_GET['op']);
if (isset($_POST['op'])) $dirty_op = trim($_POST['op']);

// proceed only if the option is valid (whitelisted)
if (in_array($dirty_op, $valid_op, true)){
	$clean_op = $dirty_op;
	
  switch ($clean_op) {

	// show an empty message form
	case "mod":
		editmessage();
	break;

	// submit the message form and store in the database
	case "addmessage":
		$ret = 'message.php?op=confirmsent';
		$controller = new icms_ipf_Controller($contact_message_handler);
		
		///////////////////////////////////////////////////////////////////////////////////////
		///// Verify captcha code, based on McDonald's implementation in Impression 1.0.2 /////
		///////////////////////////////////////////////////////////////////////////////////////
		if ($module->config['use_captcha'] == true) {
			$icmsCaptcha = icms_form_elements_captcha_Object::instance(); 
			if (!$icmsCaptcha->verify()) {
				redirect_header('message.php?op=mod', 2, $icmsCaptcha->getMessage());
				exit;
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////
		$controller->storeFromDefaultForm(_CO_CONTACT_MESSAGE_CREATED,
			_CO_CONTACT_MESSAGE_MODIFIED, $ret);
		break;
	
	// confirmation message and email to the addresses specified in the module's preferences
	case "confirmsent":
		$mailaddress = $mailsubject = $mailbody = $headers = '';
		$contact_message_handler = icms_getModuleHandler('message', basename(dirname(__FILE__)),
			'contact');
		
		// retrieve the last saved message as an object
		$criteria = new icms_db_criteria_Compo();
		$criteria->setSort('message_id');
		$criteria->setOrder('DESC');
		$criteria->setLimit(1);
		$messageObj = $contact_message_handler->getObjects($criteria);
		$messageObj = $messageObj[0];
		
		// send message as email - maybe should try/catch this?
		$mailaddress = str_replace(' ', '', $module->config['primary_contact']);
		$mailcreator = $messageObj->getVar('creator');
		$mailsubject = $messageObj->getVar('title');
		$mailbody = $messageObj->getVar('description');
		$mailbody = trim($mailbody);
		$headers = "From: " . $mailcreator . "<" . $mailcreator . ">\r\nContent-type: text/plain\r\n";
		mail($mailaddress, $mailsubject, $mailbody, $headers);
		
		// display confirmation message
		$icmsTpl->assign('contact_messagesent', true);
		break;
		
	default: // show an empty message form
  		editmessage();
		break;
	}
}

// check if the module's breadcrumb should be displayed
if ($module->config['show_breadcrumb'] == true) {
	$icmsTpl->assign('contact_show_breadcrumb', $module->config['show_breadcrumb']);
} else {
	$icmsTpl->assign('contact_show_breadcrumb', false);
}

$icmsTpl->assign('contact_module_home', contact_getModuleName(true, true));

include_once 'footer.php';