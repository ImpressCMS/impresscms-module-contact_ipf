<?php
/**
* English language constants related to module information
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		blauer-fisch (Rene Sato)
*/

if (!defined("ICMS_ROOT_PATH")) die("ImpressCMS Basispfad ist nicht definiert");

// Module Info
// The name of this module

global $icmsModule;
define("_MI_CONTACT_MD_NAME", "Kontakt");
define("_MI_CONTACT_MD_DESC", "Ein einfaches Kontakt Modul");
define("_MI_CONTACT_MESSAGES", "Nachrichten");
define("_MI_CONTACT_PRIMARY_CONTACT", "Primäre Kontakt Email Adresse(n)");
define("_MI_CONTACT_PRIMARY_CONTACT_DSC", "Nachrichten von diesem Formular werden an den Webmaster geschickt. Es können mehrere Email Adressen eingetragen werden, diese müssen mit einem Komma ',' getrennt werden.");
define("_MI_CONTACT_MESSAGE_ADD", "Nachricht versenden");
define("_MI_CONTACT_MESSAGE_ADD_DSC", "Füllen Sie das Formular aus um uns eine Nachrcht zu hinterlassen.");
define("_MI_CONTACT_USE_CAPTCHA", "CAPTCHA für das Formular benutzen?");
define("_MI_CONTACT_USE_CAPTCHA_DSC", "Diese Art der Verifizierung ist grundsetzlich notwendig, wenn SPAM vermieden werden soll. Das Aussehen und Verhalten der Verifizierung kann über die Systemeinstellungen von ImpressCMS geändert werden.");
define("_MI_CONTACT_TEMPLATES", "Templates");
define("_MI_CONTACT_MANUAL", "Anleitung (PDF)");
define("_MI_CONTACT_FINAL", "Kann in produktiven Webseite eingesetzt werden. Benutzung auf eigene Gefahr.");
define("_MI_CONTACT_SHOW_BREADCRUMB", "Zeige Breadcrumb Navigation?");

// New language constants in version 1.04
define("_MI_CONTACT_SHOW_CATEGORIES", "Zeige Kategorien an?");
define("_MI_CONTACT_SHOW_CATEGORIES_DSC", "Ein- und Ausschalten von Kategorien in der Adminseite und Userseite (funktioniert nur, wenn das Sprockets Module installiert ist).");