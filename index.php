<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
require_once 'header.php';
require_once 'descriptionSite.php';

?>

    
    <main role="main">

     

      <div class="album py-5 bg-light">
        <div class="container">
          <p class="text-center">Tous mes films</p>
          <div class="row">

            <?php 
            $query = $db->query("SELECT * FROM film ORDER BY RAND()");
            $show = ShowResult::show($query);
              ?>
          </div>
        </div>
      </div>

    </main>
<?php require_once 'footer.php'; ?>
