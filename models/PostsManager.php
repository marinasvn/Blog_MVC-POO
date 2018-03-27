<?php

namespace BLOG\models;

require_once("MainManager.php");

class PostsManager extends Main
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT name FROM categorie");
        return $req;
    }

    public function getPostsAdmin()
    {
        $db = $this->dbConnect();
        $reqCat = $db->query('SELECT * FROM categorie');
        return $reqCat;
    }

    public function addPostModel($title,$text,$img,$categorie)
    {
        $db = $this->dbConnect();

        // get user id
/*        $getUserId = $db->prepare('SELECT id_user');
        session_start();
        $user_id = $_SESSION['id_user'];

        return $_SESSION['id_user'];*/


       // insert post in database
        $req = $db->prepare('INSERT INTO post(id_post, title, text, img, date_heure, user_id) VALUES(NULL, :title, :text, :img, NOW(), 2)');
            
                $req->execute(array(
                    'title' => $title,
                    'text' => $text,
                    'img' => $img['name']
                ));

        $req->closeCursor();

        // insert categories in database
        $thisPostId = $db->lastInsertId();
        $insertcategories = $db->prepare('INSERT INTO post_categorie(id_post, id_categorie) VALUES(:id_post, :id_categorie)');
        foreach ($categorie as $cat) {
            
            $insertcategories->execute(array(
                'id_post' => $thisPostId,
                'id_categorie' => $cat
            ));
        }
        $insertcategories->closeCursor();

        // upload image to server
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($img['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($img["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($img["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($img["tmp_name"], $target_file)) {
                echo "The file ". basename( $img["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }

}
