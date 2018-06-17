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
		/*les requêtes servent à sélectionner uniquement les
		genre de film et les pays présents dans la base de données

		*/
		$type = $db->query("SELECT DISTINCT type FROM film ");
			?>
			<label>Selection par genre</label>
			<select class="type form-control" name="type">
				
			<option value="selected" selected>selection</option>
			<?php 
			while ($data = $type->fetch(PDO::FETCH_ASSOC)) { 

				echo '<option value="'.$data['type'].'"> '.$data['type'].' </option>';
			 }
			?>
			</select>
			<?php
			$country = $db->query("SELECT DISTINCT country FROM film ");
			?>
			<label>Selection par pays</label>
			<select class="country form-control" name="country">
				
			<option value="selected" selected>selection</option>
			<?php 
			while ($data = $country->fetch(PDO::FETCH_ASSOC)) { 

				echo '<option value="'.$data['country'].'"> '.$data['country'].' </option>';
			 }


			?>
			</select>
			<?php echo $input->submit('ajax2'); ?>
	</div>
</form>

	<div class="result">
		
	</div>

<?php 
require_once 'footer.php' ?>