<?php
/**
* Configuring the amdin side menu for the module
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

global $icmsConfig;

$module = icms::handler("icms_module")->getByDirname(basename(dirname(dirname(__FILE__))));

$adminmenu[] = array(
	"title" => _MI_CONTACT_MESSAGES,
	"link" => "admin/message.php");
	
	$headermenu[] = array(
		"title" => _CO_ICMS_GOTOMODULE,
		"link" => ICMS_URL . "/modules/" . $module->getVar("dirname"));
		
	$headermenu[] = array(
		"title" => _PREFERENCES,
		"link" => "../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod="
		. $module->getVar("mid"));
	
	$headermenu[] = array(
		"title" => _MI_CONTACT_TEMPLATES,
		"link" => "../../system/admin.php?fct=tplsets&op=listtpl&tplset="
			. $icmsConfig["template_set"] . "&moddir=" . $module->getVar("dirname"));
	
	$headermenu[] = array(
		"title" => _CO_ICMS_UPDATE_MODULE,
		"link" => ICMS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&amp;module="
		. $module->getVar("dirname"));

	$headermenu[] = array(
		"title" => _MODABOUT_ABOUT,
		"link" => ICMS_URL . "/modules/contact/admin/about.php");
	
	$headermenu[] = array(
		"title" => _MI_CONTACT_MANUAL,
		"link" => ICMS_URL . "/modules/contact/manual/contact_manual.pdf");