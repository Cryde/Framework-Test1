<?php
session_start();

// On inclue la configuration
include 'conf/log.inc.php';
include 'conf/role.inc.php';
include 'conf/sql.inc.php';
include 'conf/security.inc.php';
include 'conf/app.inc.php';

// Inclusion du kernel et des divers outils
include 'kernel.inc.php';
include 'logger.inc.php';
include 'security.inc.php';
include 'sql.inc.php';