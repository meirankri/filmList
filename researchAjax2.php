<style>
	input{
		width: 10%;
		background-color: red;
	}
</style>
<?php

require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
$input = new BootstrapForm();
require_once 'header.php';
require_once 'descriptionSite.php';
 ?>
 <form  action="" method="POST" class="contenue" id="contenue" enctype="multipart/form-data">
    <div class="form-group">
		
		<?php 
		echo $input->input('Genre','type');
		echo $input->input('pays','country');
		
		echo $input->submit('ajax');
		?>

			
	</div>
</form>

	<div class="result">
		
		
	</div>

<?php 
require_once 'footer.php' ?>