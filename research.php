<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
$input = new BootstrapForm();
require_once 'header.php';
 require_once 'descriptionSite.php';
 echo "<form action='' method='POST'>   ";
echo $input->input('recherche','search','text');
echo $input->submit();
if (!empty($_POST)) {
	$post = $_POST['search'];
	$search = $db->query("SELECT * FROM film WHERE (title like :post or Synopsis like :post)  ",array(
			"post"=>'%'.$post.'%'
	));
	echo "</form>";
	?>
	<div class="album py-5 bg-light">
        <div class="container">
          	<p class="text-center">resultat de la recherche</p>
          <div class="row">
			<?php 
		$show = ShowResult::show($search);
			} ?>

		</div>
	</div>
</div>
 


<?php require_once 'footer.php'; ?>