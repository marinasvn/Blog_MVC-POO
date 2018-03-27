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

    public function addPost()
    {
        $db = $this->dbConnect();

    }

    /*public function getOnePost($id_post)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM post WHERE id = ?');
        $req->execute(array($id_post));
        $post = $req->fetch();

        return $post;
    }*/
}
