<?php

define('_MEMBRE', (1 << 0));
define('_MODERATE', (1 << 1));
define('_ADMIN', (1 << 2));

define('ROLE_MEMBRE', _MEMBRE);
define('ROLE_MODERATE', ROLE_MEMBRE | _MODERATE);
define('ROLE_ADMIN', ROLE_MODERATE | _ADMIN);

function getNameRole($role){
	
	$arRole = array(ROLE_MEMBRE => 'Membre', ROLE_MODERATE => 'Moderator', ROLE_ADMIN => 'Administrateur');

	return $arRole[$role];
}