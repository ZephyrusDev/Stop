<?php
/*
 * Cephalus Content Management System (http://mobicms.net)
 *
 * For copyright and license information, please see the LICENSE.md
 * Installing the system or redistributions of files must retain the above copyright notice.
 *
 * @link        http://mobicms.net Cephalus Project
 * @copyright   Copyright (C) Cephalus Community
 * @license     LICENSE.md (see attached file)
 */

/**
 * Check the current PHP version
 */
if (version_compare(PHP_VERSION, '5.5', '<')) {
    die('<div style="text-align: center; font-size: xx-large"><strong>ERROR!</strong><br>Your needs PHP 5.5 or higher</div>');
}


/**
 * Bootstrap the application
 */
define('JOOMLA_MINIMUM_PHP', '5.3.10');
if (version_compare(PHP_VERSION, JOOMLA_MINIMUM_PHP, '<'))
{
	die('Your host needs to use PHP ' . JOOMLA_MINIMUM_PHP . ' or higher to run this version of Joomla!');
}



define('CephalusSecure', true);

# Initialize CephalusCMS
require_once(dirname(__FILE__) . '/application/Bootstrap.php');

# Initialize Drivers
$Cephalus = new CephalusCMS;
$Cephalus->exec();
$db = new Connect($Cephalus->MySQLi['Hostname'], $Cephalus->MySQLi['Username'], $Cephalus->MySQLi['Password'], $Cephalus->MySQLi['Database']);
$core = new Core;
$users = new UserManager;
$users->GetDetails();
$registration = new Registration();
$login = new login();

# Templating System
require_once(dirname(__FILE__) . '/application/core/template.php');

	


	


?>