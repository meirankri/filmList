<?php

require_once 'Autoloader.php';
Autoloader::register();
$db = App::getDatabase();
$input = new BootstrapForm(); 

if (!empty($_POST['title'] && $_POST['synopsis'] && $_POST['country'] && $_POST['type'])) {
            
			$db->query("INSERT INTO film (title,synopsis,country,image,type) VALUES(:title,:synopsis,:country,:image,:type)",array(
            "title" => trim($_POST['title']), 
            "synopsis" => trim($_POST['synopsis']),
            "country" => trim($_POST['country']),
            "image" => trim($_FILES['image']['name']),
            "type" => trim($_POST['type'])
        	));
            $db->uploadPhoto();
             echo "<script>alert('post reussie')</script>";

            
		}
