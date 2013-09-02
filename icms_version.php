<?php
/**
* Contact version infomation
*
* This file holds the configuration information of this module
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

/**  General Information  */
$modversion = array(
  'name'=> _MI_CONTACT_MD_NAME,
  'version'=> 1.05,
  'description'=> _MI_CONTACT_MD_DESC,
  'author'=> "Madfish (Simon Wilkinson)",
  'credits'=> "Skeleton code generated with ImBuilding.",
  'help'=> "",
  'license'=> "GNU General Public License (GPL)",
  'official'=> 0,
  'dirname'=> basename( dirname( __FILE__ ) ),

/**  Images information  */
  'iconsmall'=> "images/icon_small.png",
  'iconbig'=> "images/icon_big.png",
  'image'=> "images/icon_big.png", /* for backward compatibility */

/**  Development information */
  'status_version'=> "1.05",
  'status'=> "Beta",
  'date'=> "2/9/2013",
  'author_word'=> "",

/** Contributors */
  'developer_website_url' => "https://www.isengard.biz",
  'developer_website_name' => "Isengard.biz",
  'developer_email' => "simon@isengard.biz");

$modversion['people']['developers'][] = "Madfish (Simon Wilkinson)";

/** Manual */
$modversion['manual']['wiki'][] = "<a href='http://wiki.impresscms.org/index.php?title=Contact' target='_blank'>English</a>";

$modversion['warning'] = _MI_CONTACT_FINAL;

/** Administrative information */
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

/** Database information */
$modversion['object_items'][1] = 'message';

$modversion["tables"] = icms_getTablesArray($modversion['dirname'], $modversion['object_items']);

/** Install and update informations */
$modversion['onInstall'] = "include/onupdate.inc.php";
$modversion['onUpdate'] = "include/onupdate.inc.php";

/** Search information */
$modversion['hasSearch'] = 0;

/** Menu information */
$modversion['hasMain'] = 1;

/** Templates information */
$modversion['templates'][1] = array(
  'file' => 'contact_header.html',
  'description' => 'Module Header');

$modversion['templates'][] = array(
  'file' => 'contact_footer.html',
  'description' => 'Module Footer');

$modversion['templates'][] = array(
  'file' => 'contact_admin_message.html',
  'description' => 'Message Admin Index');

$modversion['templates'][] = array(
  'file' => 'contact_message.html',
  'description' => 'Message Index');

$modversion['templates'][]= array(
	'file' => 'contact_requirements.html',
	'description' => 'Message module requirements'
);

/** Preferences information */

global $icmsConfig;

$modversion['config'][1] = array(
	'name' => 'primary_contact',
	'title' => '_MI_CONTACT_PRIMARY_CONTACT',
	'description' => '_MI_CONTACT_PRIMARY_CONTACT_DSC',
	'formtype' => 'textbox',
	'valuetype' => 'text',
	'default' => $icmsConfig['adminmail']);

$modversion['config'][] = array(
	'name' => 'use_captcha',
	'title' => '_MI_CONTACT_USE_CAPTCHA',
	'description' => '_MI_CONTACT_USE_CAPTCHA_DSC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => '1');

$modversion['config'][] = array(
	'name' => 'show_breadcrumb',
	'title' => '_MI_CONTACT_SHOW_BREADCRUMB',
	'description' => '_MI_CONTACT_SHOW_BREADCRUMB_DSC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => '1');

$modversion['config'][] = array(
	'name' => 'show_categories',
	'title' => '_MI_CONTACT_SHOW_CATEGORIES',
	'description' => '_MI_CONTACT_SHOW_CATEGORIES_DSC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => '1');

/** Comments information */
$modversion['hasComments'] = 0;