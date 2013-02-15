<?php
/**
 * Fonction vérifiant le login et le mdp entré en param
 * @param string $login
 * @param string $pass
 * @return mixed
 */
function checkLogin($login, $pass){
	
	$pdo = PDO2::getInstance();
	
	$query = $pdo->prepare('SELECT * FROM `user` WHERE login = ? AND password = ?');
	$query->execute(array($login, $pass));
	
	return $query->fetch();
}

/**
 * Ajoute un utilisateur en BDD
 * @param unknown $login
 * @param unknown $pass
 * @param string $role
 */
function addUser($login, $pass, $role = ROLE_MEMBRE){
	
	$pdo = PDO2::getInstance();
	
	$query = $pdo->prepare('INSERT INTO `user`(login, password, role) VALUES(?, ?, ?)');
	$query->execute(array($login, $pass, $role));
}

/**
 * Retourne si l'utilisateur existe ou non
 * @param string $login
 * @return boolean
 */
function existUser($login){
	
	$pdo = PDO2::getInstance();
	
	$query = $pdo->prepare('SELECT COUNT(*) as nb FROM `user` WHERE login = ?');
	$query->execute(array($login));
	
	return $query->fetch(PDO::FETCH_OBJ)->nb > 0;	
}