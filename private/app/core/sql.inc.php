<?php

class PDO2 extends PDO{
	
	private static $instance;
	
	public function __construct(){
		
	}
	
	public static function getInstance(){
		
		if (!isset(self::$instance)) {
			
			try {
				self::$instance = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD,
						array(
								PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
								PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
						));
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $e) {
				echo $e;
			}
		}
		return self::$instance;
	}
}