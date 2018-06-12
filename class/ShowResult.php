<?php 

/** cette class sert à éviter de retaper le code qui 
boucle pour afficher tout les résultat avec la mise en forme,
pour appeler la function qui est static vu qu'elle sert qu'a une seule function: $var = ShowResult::show($varRequete) en paramètre c'est la variable qui contient la la requête.
 * 
 */
class ShowResult 
{
	
	static function show($query)
	{
		while ($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
              
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                
                <div class="card-body">
                  <p class="text-center"><?php echo $data['title']; ?></p>
                 <p class="card-text">
                    <img class="img-fluid" alt="" src="./img/<?php echo ($data['image']) ?>" >
                 </p>
                 <strong>Synopsis:</strong>
                  <p class="card-text"><?php echo $data['synopsis']; ?></p>

                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="delete.php?id=<?php echo $data['id']?>">delete</a></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <?php
            //fin du while
             } 
	}

}