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
define("_MI_CONTACT_MD_NAME", "お問い合わせ");
define("_MI_CONTACT_MD_DESC", "ImpressCMSのモジュール問い合わせ");
define("_MI_CONTACT_MESSAGES", "メッセージ");
define("_MI_CONTACT_CATEGORIES", "カテゴリ");
define("_MI_CONTACT_PRIMARY_CONTACT", "Primary contact email(s)");
define("_MI_CONTACT_PRIMARY_CONTACT_DSC", "Messages submitted from the user side will be sent to these addresses. Separate multiple addresses with a comma ',' character");
define("_MI_CONTACT_MESSAGE_ADD", "メッセージを送信");
define("_MI_CONTACT_MESSAGE_ADD_DSC", "Please submit this form to send an email to the site administrators.");
define("_MI_CONTACT_USE_CAPTCHA", "送信フォームにCAPTCHAを使用しますか？");
define("_MI_CONTACT_USE_CAPTCHA_DSC", "This is basically essential, unless you love spam. You can change the appearance and behaviour in the ImpressCMS CAPTCHA preferences.");
define("_MI_CONTACT_TEMPLATES", "テンプレート");
define("_MI_CONTACT_MANUAL", "マニュアル (PDF)");
define("_MI_CONTACT_FINAL", "Production release. Use this module at your own risk.");
define("_MI_CONTACT_SHOW_BREADCRUMB", "パンくずリスト表示？");

// New language constants in version 1.04
define("_MI_CONTACT_SHOW_CATEGORIES", "カテゴリを表示しますか？");
define("_MI_CONTACT_SHOW_CATEGORIES_DSC", "Turn categories on/off on both user and admin side (only if Sprockets module installed).");