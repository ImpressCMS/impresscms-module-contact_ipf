<?php
/**
* Catalan language constants related to module information
*
* @copyright	Copyright Madfish (Simon Wilkinson) 2011
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License (GPL)
* @since		1.0
* @author		Madfish (Simon Wilkinson) <simon@isengard.biz>
* @package		contact
* @version		puntoyaparte.de (Montserrat Varela Navarro)
*/

if (!defined("ICMS_ROOT_PATH")) die("La ruta de base de ImpressCMS no està definida");

// Module Info
// The name of this module

global $icmsModule;
define("_MI_CONTACT_MD_NAME", "Contacte");
define("_MI_CONTACT_MD_DESC", "Un mòdul de contacte senzill");
define("_MI_CONTACT_MESSAGES", "Missatges");
define("_MI_CONTACT_PRIMARY_CONTACT", "Primer correu electrònic de contacte)");
define("_MI_CONTACT_PRIMARY_CONTACT_DSC", "Els missatges d'aquest formulari s'enviaran al webmaster. Es pot escriure més d'un correu electrònic, que cal separar amb una coma ','.");
define("_MI_CONTACT_MESSAGE_ADD", "Enviar missatge");
define("_MI_CONTACT_MESSAGE_ADD_DSC", "Ompliu el formulari i deixeu-nos un missatge.");
define("_MI_CONTACT_USE_CAPTCHA", "¿Utilitzar CAPTCHA per al formulari?");
define("_MI_CONTACT_USE_CAPTCHA_DSC", "Aquest tipus de verificació és necessària per a evitar spam. La manera de realitzar la verificació pot modificar-se a través de les configuracions del sistema de ImpressCMS.");
define("_MI_CONTACT_TEMPLATES", "Plantilles");
define("_MI_CONTACT_MANUAL", "Instruccions (PDF)");
define("_MI_CONTACT_FINAL", "El mòdulo pot utilitzar-se en pàgines web productives. Ús a risc propi.");
define("_MI_CONTACT_SHOW_BREADCRUMB", "¿Mostra la navegació el fil d'Ariadna?");
