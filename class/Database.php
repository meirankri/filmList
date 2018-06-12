<?php
/*
    class qui sert à se connecter à la base de donnée
    avec une function construct dans laquelle il y a les données de connexion, et une function query pour tout ce qui est requête sql

*/
class Database
{
    private $pdo;

    public function __construct($dbname, $username, $password = null, $host = '127.0.0.1')
    {
        $this->pdo = new PDO("mysql:dbname=$dbname;host=$host", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }

    public function query($statement, $params = [])
    {
        if ($params) {
            $req = $this->pdo->prepare($statement);
            $req->execute($params);
        } else {
            $req = $this->pdo->query($statement);
        }
        return $req;
    }

    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    private function lastId()
    {
       $req = $this->query("SELECT titre,MAX(id) AS max_id FROM cours ");
        while ($row = $req->fetch()) {
            
            if ($row['max_id']){
            $lastId = $row['max_id']; 
            return $lastId;
            }else{
                return rand();
            }
        
        }
    }

    public function uploadPhoto()
    {
        $lastId = $this->getLastInsertId();
        $tmpName = $_FILES['image']['tmp_name'];
        $good_extention =array('jpg','jpeg','gif','png');
        $extensionFiles = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
        if (in_array($extensionFiles, $good_extention)) {
            $photoPath = "img/{$lastId}.{$extensionFiles}";
            $send = move_uploaded_file($tmpName, $photoPath);
            $photoName = $lastId.".".$extensionFiles;
            $this->query("UPDATE film SET image='$photoName' WHERE id=$lastId");
        }
    }
}
