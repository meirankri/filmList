<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
if (!empty($_POST)) {
	$post = $_POST['research'];
	$search = $db->query("SELECT * FROM film WHERE (title like :post or Synopsis like :post)  ",array(
			"post"=>'%'.$post.'%'
	));
	
	?>
	<div class="album py-5 bg-light">
        <div class="container">
          	<p class="text-center">résultat de la recherche</p>
          <div class="row">
			<?php 
			//function qui affiche les résultat avec une mise en forme spécifique ce qui évite de répéter le même code, et c'est plus propre.
			//en paramètre c'est la variable qui contient la requête.
		$show = ShowResult::show($search);
			} ?>

		</div>
	</div>
</div>
 