<?php 
require_once 'Autoloader.php';
Autoloader::register();
$db = App::getDatabase();



 $id = $_GET['id'];
 //requête pour récupérer le titre qui va être supprimé pour l'afficher dans le message de confirmation
 $title = $db->query("SELECT title  FROM film WHERE id = :id",array( "id"=>$id
));
//supprime le film
$req = $db->query("DELETE  FROM film WHERE id = :id",array( "id"=>$id
));
//récupère le titre, déclare le message get qui sera affiché en js au moment de la suppression
// previusPage récupère la page de ou le delete à été envoyé 
while ($data = $title->fetch(PDO::FETCH_ASSOC)) {
	if ($req) {
		$message = "le film ".$data['title']." à bien été supprimér";

		$previusPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php?message='.$message.'';
		header('Location: ' . $previusPage."?message=".$message."");
		
		
	}

}

