<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
//il faut recuperer les donnes du formulaire soit avec data 
//soit avec la function serialize()

?>

 <main role="main">
<div class="album py-5 bg-light">
        <div class="container">
          <p class="text-center">Tous mes films</p>
          <div class="row">

            <?php
            //série de condition pour savoir si 1 des champs ou les 2 ou aucun on été rempli par l'utilisateur pour la requête qui va chercher un film selon les critères exact envoyés


            if (!empty($_POST['type']) and empty($_POST['country'] )){

              $query = $db->query("SELECT * FROM film WHERE (type = :type) ",array(
                'type'=>$_POST['type']

                ));
            $show = ShowResult::show($query);
            

              }
              elseif (!empty($_POST['country']) and empty($_POST['type'] )){

              $query = $db->query("SELECT * FROM film WHERE (country = :country) ",array(
                'country'=>$_POST['country']

                ));

            $show = ShowResult::show($query);
            }
            elseif (!empty($_POST['country'] and $_POST['type'] )){

              $query = $db->query("SELECT * FROM film WHERE (type = :type) and (country = :country) ",array(
                'type'=>$_POST['type'],
                'country'=>$_POST['country']

                ));
            $show = ShowResult::show($query);
            }else {
              echo "Veuillez sélectionner au moins une recherche !";
            }

            /*else{
              $type = '';
            }
            

            
            $query = $db->query("SELECT * FROM film WHERE (type = :type) and (country = :country)",array(
                'type'=>$type,
                'country'=>$country

            ));
            $show = ShowResult::show($query);*/
              ?>
          </div>
        </div>
      </div>
  </main>
