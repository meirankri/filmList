<?php 
require_once 'Autoloader.php';
Autoloader::register();
//la variable $db est un objet Database et on peut avec faire des query dans la bdd
$db = App::getDatabase();
$input = new BootstrapForm();
require_once 'header.php';
require_once 'descriptionSite.php';
echo "<form class='form-group'>";
echo $input->input('recherche','search','text');
echo $input->submit('dyna');
echo "</form>";
?>
<div class="result"></div>

 


<?php require_once 'footer.php'; ?>