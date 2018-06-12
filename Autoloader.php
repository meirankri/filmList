<?php 

/*cette class static sert à appeler toutes les class contenue dans le dossier class dès qu'une d'elles est appelé de façon dynamique, il suffit juste de faire un require de cette class et d'appeler le function autoload pour tout requierer 
 * 
 */
class Autoloader 
{
	static function Autoload($class_name){
		
	require 'class/'.$class_name.'.php';

	}

	static function register(){

		//function qui sert a charger automatiquement les class, on lui met en parametre un tableau, en premier ya le nom de la class courante en 2 le nom de la function qui va recuperer les class
		spl_autoload_register(array(__CLASS__,'Autoload'));
	}


}
