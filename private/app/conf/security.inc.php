<?php

define('SECRET_SALT', 'azkljl6+"99+65sdgg');

$firewallConf = array(
	'register' => array(
		'logged' => false
	),		
	'login' => array(
		'action' => array(
			'index' => array(
				'logged' => false
			)
		)	
	),
	'panel' => array(
		'action' => array(
			'index' => array(
				'logged' => true,
				'authorized' => array(_MODERATE, _ADMIN)
			),
			'admin' => array(
				'logged' => true,
				'authorized' => array(_ADMIN)
			),
			'moderator' => array(
				'logged' => true,
				'authorized' => array(_MODERATE)
			),
			'log' => array(
				'logged' => true,
				'authorized' => array(_ADMIN)		
			)
		)
	)
);