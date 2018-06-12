<?php 
/*
 pour éviter de créer un objet database on utilise une function static qui donne les bonnes données de connexion. 
*/

class App{

	static $db =null;

	//condition pour éviter de refaire une connexion à la bdd si on est déjà connecté.
	static function getDatabase(){
		if(!self::$db){

		self::$db = new Database('movie','root');	

			return self::$db;
		}

	}



}