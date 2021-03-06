<?php

/**
* Classes representing message objects
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

include_once(ICMS_ROOT_PATH . '/modules/contact/include/functions.php');

class ContactMessage extends icms_ipf_Object {

	/**
	 * Constructor
	 *
	 * @param object $handler ContactPostHandler object
	 */
	public function __construct(& $handler) {
		global $icmsConfig;
		$sprocketsModule = icms_getModuleInfo('sprockets');

		icms_ipf_object::__construct($handler);

		$this->quickInitVar('message_id', XOBJ_DTYPE_INT, TRUE);
		$this->quickInitVar('creator', XOBJ_DTYPE_TXTBOX, TRUE); // email address
		$this->quickInitVar('title', XOBJ_DTYPE_TXTBOX, TRUE); // email subject
		if (icms_get_module_status("sprockets") && icms::$module->config['show_categories'] == '1') {
			$this->initNonPersistableVar('category', XOBJ_DTYPE_INT, 'category', FALSE, FALSE, FALSE, TRUE); // Category
		}
		$this->quickInitVar('description', XOBJ_DTYPE_TXTAREA, TRUE); // email body
		$this->quickInitVar('date', XOBJ_DTYPE_INT, TRUE, false, false, // timestamp
		$this->handler->setDate());
		
		// Only display the tag (category) field if the sprockets module is installed & preferences allow it
		
		if (icms_get_module_status("sprockets") && icms::$module->config['show_categories'] == '1')
		{
			$this->setControl('category', array(
			'name' => 'select',
			'itemHandler' => 'tag',
			'method' => 'getCategoryOptions',
			'module' => 'sprockets'));
		}
		
		// Only allow simple text messages with line breaks - if you want to receive html email
		// from crazy people on the internet, change 'textarea' to 'dhtmltextarea'
		$this->setControl('description', 'textarea');
		
		$this->initCommonVar('dohtml', false, 0);
		$this->initCommonVar('dobr', false, 0);
		$this->initCommonVar('doimage', false, 0);
		$this->initCommonVar('dosmiley', false, 0);
		$this->initCommonVar('docxode', false, 0);
		
		// Make date read only, it's for internal use
		$this->doHideFieldFromForm('date');
	}

	/**
	 * Overriding the IcmsPersistableObject::getVar method to assign a custom method on some
	 * specific fields to handle the value before returning it
	 *
	 * @param str $key key of the field
	 * @param str $format format that is requested
	 * @return mixed value of the field that is requested
	 */
	public function getVar($key, $format = 's') {
		if ($format == 's' && in_array($key, array ('date'))) {
			return call_user_func(array ($this,	$key));
		}
		return parent :: getVar($key, $format);
	}
	
	/*
     * Formats the date in a sane (non-American) way
	 */
	public function date() {
		$date = $this->getVar('date', 'e');
		$date = date('j F Y, H:i:s', $date);
		return $date;
	}
}