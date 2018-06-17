<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
$input = new BootstrapForm();
require_once 'header.php';
require_once 'descriptionSite.php';
 
	$type = $db->query("SELECT DISTINCT type FROM film ");
	?>
	<select class="type">
		
	<option value=""selected>select</option>
	<?php 
	while ($data = $type->fetch(PDO::FETCH_ASSOC)) { 

		echo '<option value="'.$data['type'].'"> '.$data['type'].' </option>';
	 }
	?>
	</select>
	<?php
	$country = $db->query("SELECT DISTINCT country FROM film ");
	?>
	<select class="type">
		
	<option value=""selected>select</option>
	<?php 
	while ($data = $country->fetch(PDO::FETCH_ASSOC)) { 

		echo '<option value="'.$data['country'].'"> '.$data['country'].' </option>';
	 }
	?>
	</select>
	<?php
	$search = $db->query("SELECT * FROM film ");
	
	?>

	<div class="album py-5 bg-light">
        <div class="container">
          	<p class="text-center">résultat de la recherche</p>
          <div class="row">
			<?php 
			
		while ($data = $search->fetch(PDO::FETCH_ASSOC)) { 
              
            echo "<div class='critere col-md-4 ".$data['type']." ".$data['country']." '>";
            ?>
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="text-center"><?php echo $data['title']; ?></p>
                 <p class="card-text">
                    <img class="img-fluid" alt="" src="./img/<?php echo ($data['image']) ?>" >
                 </p>
                 <strong>Synopsis:</strong>
                  <p class="card-text "><?php echo $data['synopsis']; ?></p>

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="delete.php?id=<?php echo $data['id']?>">delete</a></button>
                      <p>genre: <?php echo $data['type']; ?></p>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php
            //fin du while
             } 
			 ?>

		</div>
	</div>
</div>
 


<?php require_once 'footer.php'; ?>