<?php
/**
* Common functions used by the module
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		$Id$
*/

if (!defined("ICMS_ROOT_PATH")) die("ICMS root path not defined");

//Returns TRUE if the email address is valid, otherwise false
function contact_is_valid_email_address($email)
{
	$qtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
	$dtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
	$atom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
	$quoted_pair = '\\x5c[\\x00-\\x7f]';
	$domain_literal = "\\x5b($dtext|$quoted_pair)*\\x5d";
	$quoted_string = "\\x22($qtext|$quoted_pair)*\\x22";
	$domain_ref = $atom;
	$sub_domain = "($domain_ref|$domain_literal)";
	$word = "($atom|$quoted_string)";
	$domain = "$sub_domain(\\x2e$sub_domain)*";
	$local_part = "$word(\\x2e$word)*";
	$addr_spec = "$local_part\\x40$domain";
	return preg_match("!^$addr_spec$!", $email) ? 1 : 0;
}

/**
 * @todo to be move in icms core
 */
function contact_getModuleName($withLink = TRUE, $forBreadCrumb = false, $moduleName = false) {
		
	$contactModule = icms_getModuleInfo(basename(dirname(dirname(__FILE__))));
	if (!isset ($contactModule)) {
		return '';
	}

	if (!$withLink) {
		return $contactModule->getVar('name');
	} else {
		$ret = ICMS_URL . '/modules/' . $contactModule->getVar('name') . '/';
		return '<a href="' . $ret . '">' . $contactModule->getVar('name') . '</a>';
	}
}