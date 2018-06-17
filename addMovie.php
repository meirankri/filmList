<?php require_once 'header.php';
require_once 'Autoloader.php';
Autoloader::register();
$db = App::getDatabase();
$input = new BootstrapForm(); ?>

<form  action="" method="POST" class="contenue" id="contenue" enctype="multipart/form-data">
    <div class="form-group">
    	<?php 
        /*l'objet input utilise la méthode input présente dans la class BootstrapForm permet de générer des inputs, les 2 premiers paramètres sont obligatoire et sont, le label, le name ,et le troisième c'est le type, text par défaut.  
        */
    	echo $input->input('Entrez le titre','title');
    	echo $input->input('Entrez le synopsis','synopsis');
		echo $input->input('Origine','country'); 
		echo $input->input('Genre','type'); 
        
		echo $input->inputWrequired('Envoyez une photo','image','file');
		echo $input->submit();
        
		if (!empty($_POST && $_POST['title'] && $_POST['synopsis'] && $_POST['country'] && $_POST['type'])) {
        
        //ici est utilisé la méthode query pour faire une requête à la bdd est en cas de requête prepare il y a un deuxième paramètre qui contient un tableau. 
			$db->query("INSERT INTO film (title,synopsis,country,image,type) VALUES(:title,:synopsis,:country,:image,:type)",array(
            "title" => trim($_POST['title']), 
            "synopsis" => trim($_POST['synopsis']),
            "country" => trim($_POST['country']),
            "image" => trim($_FILES['image']['name']),
            "type" => trim($_POST['type'])
        	));
            //méthode pour vérifier et uploader la photo si elle existe avec le nom de l'id auto-incrémenté.
            $db->uploadPhoto();
            echo "<script>alert('le film'".$_POST['title']."' à bien été posté ')</script>";

            
		}
		


    	 ?>
    </div>
</form>
<?php require_once 'footer.php'; ?>
		