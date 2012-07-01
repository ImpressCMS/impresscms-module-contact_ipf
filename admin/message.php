<?php
/**
* Admin page to manage messages
*
* List, add, edit and delete message objects
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
function editmessage($message_id = 0) {
	global $contact_message_handler, $icmsModule, $icmsAdminTpl;

	$messageObj = $contact_message_handler->get($message_id);

	if (!$messageObj->isNew()){
		$icmsModule->displayAdminMenu(0, _AM_CONTACT_MESSAGES . " > " . _CO_ICMS_EDITING);
		$sform = $messageObj->getForm(_AM_CONTACT_MESSAGE_EDIT, 'addmessage');
		$sform->assign($icmsAdminTpl);

	} else {
		$icmsModule->displayAdminMenu(0, _AM_CONTACT_MESSAGES . " > " . _CO_ICMS_CREATINGNEW);
		$sform = $messageObj->getForm(_AM_CONTACT_MESSAGE_CREATE, 'addmessage');
		$sform->assign($icmsAdminTpl);

	}
	$icmsAdminTpl->display('db:contact_admin_message.html');
}

include_once("admin_header.php");

$contact_message_handler = icms_getModuleHandler('message', basename(dirname(dirname(__FILE__))),
	'contact');

$clean_op = '';

/** Create a whitelist of valid values, be sure to use appropriate types for each value
 * Be sure to include a value for no parameter, if you have a default condition
 */
$valid_op = array ('mod','changedField','addmessage','del','');

if (isset($_GET['op'])) $clean_op = htmlentities($_GET['op']);
if (isset($_POST['op'])) $clean_op = htmlentities($_POST['op']);

$clean_message_id = isset($_GET['message_id']) ? (int) $_GET['message_id'] : 0 ;
$clean_category_id = isset($_GET['tag_id']) ? intval($_GET['tag_id']) : 0 ;

if (in_array($clean_op,$valid_op,TRUE)) {
  switch ($clean_op) {
  	case "mod":
  	case "changedField":
  		icms_cp_header();
  		editmessage($clean_message_id);
		
  		break;
	
  	case "addmessage":
			$controller = new icms_ipf_Controller($contact_message_handler);
			$controller->storeFromDefaultForm(_AM_CONTACT_MESSAGE_CREATED, _AM_CONTACT_MESSAGE_MODIFIED);

  		break;

  	case "del":
        $controller = new icms_ipf_Controller($contact_message_handler);
  		$controller->handleObjectDeletion();

  		break;

  	default:
  		icms_cp_header();

  		$icmsModule->displayAdminMenu(0, _AM_CONTACT_MESSAGES);
		
		// If no op is set, but there is a (valid) message_id, display a single object
		if ($clean_message_id) {
			$messageObj = $contact_message_handler->get($clean_message_id);
			if ($messageObj->id()) {
				$message = $messageObj->getVar('description');
				$message = nl2br($message);
				$messageObj->setVar('description', $message);
				$messageObj->displaySingleObject();
			}
		}
		
		// Display a category select filter (if the Sprockets module is installed)
		$contactModule = icms_getModuleInfo(basename(dirname(dirname(__FILE__))));
		$sprocketsModule = icms_getModuleInfo('sprockets');
		
		if (icms_get_module_status("sprockets")) {
			
			$category_select_box = '';
			$taglink_array = $categorised_message_list = array();
			$sprockets_tag_handler = icms_getModuleHandler('tag', $sprocketsModule->getVar('dirname'),
				'sprockets');
			$sprockets_taglink_handler = icms_getModuleHandler('taglink',
					$sprocketsModule->getVar('dirname'), 'sprockets');
			
			$category_select_box = $sprockets_tag_handler->getTagSelectBox('message.php', $clean_category_id,
				_AM_CONTACT_MESSAGE_ALL_MESSAGES, FALSE, icms::$module->getVar('mid'));
			if (!empty($category_select_box)) {
				echo '<h3>' . _AM_CONTACT_MESSAGE_FILTER_BY_CATEGORY . '</h3>';
				echo $category_select_box;
			}
			
			if ($clean_category_id)
			{
				// Get a list of message IDs belonging to this tag
				$criteria = new icms_db_criteria_Compo();
				$criteria->add(new icms_db_criteria_Item('tid', $clean_category_id));
				$criteria->add(new icms_db_criteria_Item('mid', $contactModule->getVar('mid')));
				$criteria->add(new icms_db_criteria_Item('item', 'message'));
				$taglink_array = $sprockets_taglink_handler->getObjects($criteria);
				foreach ($taglink_array as $taglink) {
					$categorised_message_list[] = $taglink->getVar('iid');
				}
				$categorised_message_list = "('" . implode("','", $categorised_message_list) . "')";
				
				// Use the list to filter the persistable table
				$criteria = new icms_db_criteria_Compo();
				$criteria->add(new icms_db_criteria_Item('message_id', $categorised_message_list, 'IN'));
			}
		}
		
		if (empty($criteria)) {
			$criteria = null;
		}
			
  		$objectTable = new icms_ipf_view_Table($contact_message_handler, $criteria, array('delete'));
		$objectTable->addColumn(new icms_ipf_view_Column('creator', $align=_GLOBAL_LEFT,
			$width=false, $customMethodForValue=false, $param = false, _CO_CONTACT_MESSAGE_FROM));
		$objectTable->addColumn(new icms_ipf_view_Column('title'));
		$objectTable->addColumn(new icms_ipf_view_Column('date'));
		$objectTable->addQuickSearch('title');
  		$objectTable->setDefaultSort('date');
		$objectTable->setDefaultOrder('DESC');
  		$icmsAdminTpl->assign('contact_message_table', $objectTable->fetch());
  		$icmsAdminTpl->display('db:contact_admin_message.html');
  		break;
  }
  icms_cp_footer();
}
/**
 * If you want to have a specific action taken because the user input was invalid,
 * place it at this point. Otherwise, a blank page will be displayed
 */