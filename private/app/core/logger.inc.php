<?php

/**
 * Initilise le sytème de log
 * @return boolean
 */
function logger(){
	
	if(!ENABLE_LOG) return false;
	
	$db = selectDB();
	
	log_action($db);
		
}

/**
 * Récupère les logs
 * @return SQLite3Result
 */
function getLogAction(){
	
	$db = selectDB();
	
	$stm = $db->prepare('SELECT * FROM '.TABLE_LOG_NAME.' ORDER BY id DESC');
	$res = $stm->execute();
	return $res;
}

/**
 * Enregistre une action
 * @param SQLite3 $db
 */
function log_action($db){

	$user_id = !empty($_SESSION['id_membre']) ? $_SESSION['id_membre'] : NULL;
	$page = getCurrentModule();
	$action = getCurrentAction();
	$ip = $_SERVER['REMOTE_ADDR'];
	$isLogged = (int) isConnect();
	$session = !empty($_SESSION)? json_encode($_SESSION) : '';
	$post = !empty($_POST)? json_encode($_POST) : '';
	$get = !empty($_GET)? json_encode($_GET) : '';
	
	
	
	$stmt = $db->prepare('
			INSERT INTO '.TABLE_LOG_NAME.'(user_id, date_action, page, action, ip, logged, data_session, data_post, data_get)
			VALUES(:id, datetime(\'now\'), :page, :action, "'.$ip.'", '.$isLogged.', :session, :post, :get)');
	
	$stmt->bindValue('id', $user_id);
	$stmt->bindValue('page', $page);
	$stmt->bindValue('action', $action);
	$stmt->bindValue('session', $session);
	$stmt->bindValue('post', $post);
	$stmt->bindValue('get', $get);
	
	$stmt->execute();
}


/**
 * On selectionne la DB (on la crée si elle n'existe pas)
 * @return SQLite3
 */
function selectDB(){
	
	$db = new SQLite3(DB_LOG_PATH.'/'.DB_LOG_NAME);
	log_createTable($db);
	return $db;
}

/**
 * On crée la table de log
 * @param unknown $db
 */
function log_createTable($db){
	
	$db->exec('CREATE TABLE IF NOT EXISTS '.TABLE_LOG_NAME.' (
			id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT ,
            user_id bigint(20),           
            date_action DATETIME,
			page VARCHAR(255),
			action VARCHAR(255),
			ip VARCHAR(255),
			logged INTEGER(1), 
			data_session TEXT,
			data_post TEXT,
			data_get TEXT
			)');
}
