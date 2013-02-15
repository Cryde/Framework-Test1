<?php

/**
 * On affiche le site
 * @param string $ajaxMode
 */
function displaySite($ajaxMode){
	
	ob_start();
	include getControllerPath();
	$content = ob_get_clean();

	/* Haut du site */
	if($ajaxMode){
		include 'global/html/top.php';
		include 'global/html/menu.php';
	}

	/* Injection du contenu */
	echo $content;

	/* Bas du site */
	if($ajaxMode){
		include 'global/html/bottom.php';
	}

}
/**
 * Retourne le module courant
 * @return string
 */
function getCurrentModule(){

	return ucfirst( (!empty($_GET['page']))? $_GET['page'] : 'home' );
}

/**
 * Retourne le chemin vers le dossier module courant
 * @return string
 */
function getModulePath(){
	
	return 'Modules/'.getCurrentModule();
}

/**
 * Retourne l'action courante
 * @return string
 */
function getCurrentAction(){

	return (!empty($_GET['action']))? $_GET['action'] : 'index';
}

/**
 * Retourne le chemin complet vers le controlleur
 * @return string
 */
function getControllerPath(){
	
	$controllersPath = getModulePath();
	$action = getCurrentAction();
	
	return (file_exists($controllersPath .'/Controllers/'. $action . '.php'))? $controllersPath.'/Controllers/'	. $action . '.php' : ERROR_404_FILE;
}


/**
 * 	Rend une vue 
	Si vide, on charge la vue relative au controlleur courant sinon le controlleur mentionné
 * @param string $view La vue a retournée
 * @param array $data	Les données a passer à la vue
 * @param string $module Le module éventuel relatif à une vue à charger
 */
function render($view, $data = array(), $module = false){

	$file = '';
	if($module){
		/* @TODO gestion erreur */
		$file = 'Modules/'.ucfirst($module).'/Views/'.$view;
	}
	else{
		/* @TODO gestion erreur */
		$file = 'Modules/'.getCurrentModule().'/Views/'.$view;
	}
	extract($data);
	include $file;
}


/**
 * Charge un modèle relatif au module courant
 * @param string $modelName
 * @param string $module
 */
function loadModel($modelName, $module = false){


	$file = '';
	if($module){
		$file = 'Modules/'.ucfirst($module).'/Models/'.$modelName;
	}
	else{
		$file = 'Modules/'.getCurrentModule().'/Models/'.$modelName;
	}
	include $file;
}

/**
 * Retourne un message 
 * @param string $key
 * @param string $lang
 * @param string $module
 */
function getMessage($key, $module = false){
	
	$lang = getUserLang();
	$file = '';
	if($module){
		$file = 'Modules/'.ucfirst($module).'/Messages/lang.xml';
	}
	else{
		$file = 'Modules/'.getCurrentModule().'/Messages/lang.xml';
	}

	$translations = new SimpleXMLElement(file_get_contents($file));

	$res = $translations->xpath("trans[@id='".$key."' and @lang='".$lang."']");

	echo $res[0];
}



/**
 * Retourne la langue préférée de l'utilisateur
 * @return string
 */
function getUserLang(){
	
	return 'en';
}

/**
 * Redirige vers la page passé en paramètre
 * @param string $page
 */
function redirect($page){

	header('Location: '.$page);
}




