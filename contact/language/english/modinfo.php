<?php
/**
* English language constants related to module information
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

// Module Info
// The name of this module

global $icmsModule;
define("_MI_CONTACT_MD_NAME", "Contact");
define("_MI_CONTACT_MD_DESC", "ImpressCMS Contact module");
define("_MI_CONTACT_MESSAGES", "Messages");
define("_MI_CONTACT_CATEGORIES", "Categories");
define("_MI_CONTACT_PRIMARY_CONTACT", "Primary contact email(s)");
define("_MI_CONTACT_PRIMARY_CONTACT_DSC", "Messages submitted from the user side will be sent to these addresses. Separate multiple addresses with a comma ',' character");
define("_MI_CONTACT_MESSAGE_ADD", "Submit message");
define("_MI_CONTACT_MESSAGE_ADD_DSC", "Please submit this form to send an email to the site administrators.");
define("_MI_CONTACT_USE_CAPTCHA", "Use CAPTCHA on submission form?");
define("_MI_CONTACT_USE_CAPTCHA_DSC", "This is basically essential, unless you love spam. You can change the appearance and behaviour in the ImpressCMS CAPTCHA preferences.");
define("_MI_CONTACT_TEMPLATES", "Templates");
define("_MI_CONTACT_MANUAL", "Manual (PDF)");
define("_MI_CONTACT_FINAL", "Production release. Use this module at your own risk.");
define("_MI_CONTACT_SHOW_BREADCRUMB", "Display breadcrumb?");

// New language constants in version 1.04
define("_MI_CONTACT_SHOW_CATEGORIES", "Show categories?");
define("_MI_CONTACT_SHOW_CATEGORIES_DSC", "Turn categories on/off on both user and admin side (only if Sprockets module installed).");