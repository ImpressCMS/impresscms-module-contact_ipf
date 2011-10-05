<?php
/**
* Footer page included at the end of each page on user side of the mdoule
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

$icmsTpl->assign("contact_adminpage",  "<a href='" . ICMS_URL . "/modules/"
	. icms::$module->getVar("dirname") . "/admin/index.php'>" . _MD_CONTACT_ADMIN_PAGE . "</a>");
$icmsTpl->assign("contact_is_admin", icms_userIsAdmin(CONTACT_DIRNAME));
$icmsTpl->assign('contact_url', CONTACT_URL);
$icmsTpl->assign('contact_images_url', CONTACT_IMAGES_URL);

$xoTheme->addStylesheet(CONTACT_URL . 'module'
	. (( defined("_ADM_USE_RTL") && _ADM_USE_RTL )?'_rtl':'') . '.css');

include_once(ICMS_ROOT_PATH . '/footer.php');