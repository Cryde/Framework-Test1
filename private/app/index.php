<?php
chdir(dirname(__FILE__));


/**
 * Load the init file
 */

include 'core/init.inc.php';

logger();
firewall($firewallConf);

displaySite( (!isset($_GET['raw'])) );
