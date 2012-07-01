<?php

/**
* Class responsible for managing Contact message objects
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

class ContactMessageHandler extends icms_ipf_Handler {

	/**
	 * Constructor
	 */
	public function __construct(& $db) {
		parent::__construct($db, 'message', 'message_id', 'title', 'description',
			'contact');
	}
	
	public function setDate() {
		return time();
	}
	
	protected function beforeInsert(& $obj) {
		
		// Validate email address
		if (contact_is_valid_email_address($obj->getVar('creator', 'e'))) {
			return TRUE;
		} else {
			$obj->setErrors(_CO_CONTACT_INVALID_EMAIL);
			return false;
		}
	}
	
	/**
	 * Manages tracking of taglinks (categories), called when a message is inserted or updated
	 *
	 * @param object $obj ContactMessage object
	 * @return bool
	 */
	protected function afterSave(& $obj)
	{		
		$sprockets_taglink_handler = '';
		$label_type = '1';
		$tag_var = 'category';

		// Only update the taglinks if the object is being updated from the add/edit form (POST).
		// The taglinks should *not* be updated during a GET request (ie. when the toggle buttons
		// are used to change the completion status or online status). Attempting to do so will 
		// trigger an error, as the database should not be updated during a GET request.
		$sprocketsModule = icms::handler("icms_module")->getByDirname("sprockets");
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && icms_get_module_status("sprockets")) {
			$sprockets_taglink_handler = icms_getModuleHandler('taglink', 
					$sprocketsModule->getVar('dirname'), 'sprockets', 'sprockets');
			$sprockets_taglink_handler->storeTagsForObject($obj, $label_type, $tag_var);
		}
	
		return TRUE;
	}
	
	/**
	 * Deletes notification subscriptions, called when an article is deleted
	 *
	 * @param object $obj NewsArticle object
	 * @return bool
	 */
	protected function afterDelete(& $obj) {
		
		$sprocketsModule = $notification_handler = $module_handler = $module = $module_id
				= $category = $item_id = '';
		
		$sprocketsModule = icms_getModuleInfo('sprockets');

		// Delete taglinks
		if (icms_get_module_status("sprockets")) {
			$sprockets_taglink_handler = icms_getModuleHandler('taglink',
					$sprocketsModule->getVar('dirname'), 'sprockets');
			$sprockets_taglink_handler->deleteAllForObject($obj);
		}
		
		return TRUE;
	}
}