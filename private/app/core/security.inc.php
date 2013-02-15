<?php

/**
 * Hash une chaine passé en paramètre
 * @param unknown $str
 * @return string
 */
function hash_str($str){

	return hash('sha512', $str.SECRET_SALT);
}

/**
 * Retourne si un membre est connecté ou non 
 * @return boolean
 */
function isConnect(){
	
	return !empty($_SESSION['id_membre']);
}


/**
 * Execute le firewall
 * @param array $conf tableau de configuration de chaque module du firewall
 */
function firewall($conf){
	
	$currentModule = getCurrentModule();
	
	$options = (isset($conf[strtolower($currentModule)])) ? $conf[strtolower($currentModule)] : array();
	
	foreach($options as $function => $val ){
		
		
		if($function == 'action'){
			
			$currentAction = getCurrentAction();
			
			$optionAction = $val[$currentAction];
		
			foreach($optionAction as $j => $y){
				
				doFun($j, $y);
			}
		}
		else{
			doFun($function, $val);
		}
	}
}

/**
 * Exécute une fonction du firewall
 * @param string $funName
 * @param mixed $val
 */
function doFun($funName, $val){
	
	$fun = 'firewall_'.$funName;
	$fun($val);
}

/**
 * Fonction propre au firewall verifiant la connexion d'un utilisateur
 * @param boolean $canBeConnect
 */
function firewall_logged($canBeConnect){
	
	if(!$canBeConnect && isConnect()){
		die('Vous ne pouvez pas etre ici. Vous etes connecte');
	}
	if($canBeConnect && !isConnect()){
		die('Vous devez être connecté');
	}
}

/**
 * Fonction propre au firewall vérifiant les roles d'un membre
 * @param unknown $roles
 */
function firewall_authorized($roles){
	$i = 0;
	foreach($roles as $role){
	
		if($_SESSION['role'] & $role){
			$i++;
		}
	}
	
	if($i == 0){
		die('Vous n\'avez pas les droits nécessaires.');
	}
}







