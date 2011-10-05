<?php
/**
* Common file of the module included on all pages of the module
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

if(!defined("CONTACT_DIRNAME"))	define("CONTACT_DIRNAME", $modversion['dirname'] = 
	basename(dirname(dirname(__FILE__))));
if(!defined("CONTACT_URL")) define("CONTACT_URL", ICMS_URL . '/modules/'
	. CONTACT_DIRNAME . '/');
if(!defined("CONTACT_ROOT_PATH")) define("CONTACT_ROOT_PATH", ICMS_ROOT_PATH . '/modules/'
	. CONTACT_DIRNAME . '/');
if(!defined("CONTACT_IMAGES_URL")) define("CONTACT_IMAGES_URL", CONTACT_URL . 'images/');
if(!defined("CONTACT_ADMIN_URL")) define("CONTACT_ADMIN_URL", CONTACT_URL . 'admin/');

// Include the common language file of the module
icms_loadLanguageFile('contact', 'common');