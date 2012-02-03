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
}