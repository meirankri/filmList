<?php 
require_once 'Autoloader.php';
Autoloader::register();
$db = App::getDatabase();


echo $_GET['id'];
 $id = $_GET['id'];
$req = $db->query("DELETE  FROM film WHERE id = :id",array( "id"=>$id
));
if ($req) {
	$message = "le film à bien été supprimé";
	header("Location: index.php?message='".$message."'");
	
}




/*
<form class="reinitialise" action="delete.php">
                          <input type="hidden" name="id" value="<?php $data['id'] ?>">
                      <button type="submit" class="btn btn-sm btn-outline-secondary"><?php echo $data['id']; ?></button>
                    </form>*/