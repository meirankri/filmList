<?php require_once 'header.php';
require_once 'Autoloader.php';
Autoloader::register();
$db = App::getDatabase();
$input = new BootstrapForm(); ?>

<form  action="" method="POST" class="contenue" id="contenue" enctype="multipart/form-data">
    <div class="form-group">
    	<?php 
    	echo $input->input('Entrez le titre','title','text');
    	echo $input->input('Entrez le synopsis','synopsis','text');
		echo $input->input('Origine ','country','text'); 
		echo $input->input('Genre','type','text'); 
		echo $input->input('Envoyez une photo','image','file');
		echo $input->submit();
		if (!empty($_POST)) {
			$db->query("INSERT INTO film (title,synopsis,country,image,type) VALUES(:title,:synopsis,:country,:image,:type)",array(
            "title" => $_POST['title'], 
            "synopsis" => $_POST['synopsis'],
            "country" => $_POST['country'],
            "image" => $_FILES['image']['name'],
            "type" => $_POST['type']
        	));
            $db->uploadPhoto();
            
		}
		


    	 ?>
    </div>
</form>
		