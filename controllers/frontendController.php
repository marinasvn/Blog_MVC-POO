<?php

// Chargement des classes
require_once('models/UserManager.php');
require_once('models/PostsManager.php');
/*require_once('./app/model/AdminManager.php');*/

function allPosts()
{
    $PostsManager = new \BLOG\models\PostsManager();
    $posts = $PostsManager->getPosts();

    require('views/frontend/allPostsView.php');
}

function signUp($prenom, $nom, $email, $pass_hache, $passConfirm)
{
    if ($passConfirm == $pass_hache) {
        $UsersManager = new \BLOG\models\UsersManager();
        $user = $UsersManager->insertUser($prenom, $nom, $email, $pass_hache, $passConfirm);
    } else {
        echo "Le password doit etre identique";
    }
    header('Location: index.php');
}

function signIn($email, $pass_hache)
{
    $UsersManager = new \BLOG\models\UsersManager();
    $user = $UsersManager->connectUser($email, $pass_hache);

    require('views/frontend/connectedView.php');
}

function admin()
{
    require('views/backend/adminConnect.php');
}
function connectAdmin($email, $pass_hache)
{
    $UsersManager = new \BLOG\models\UsersManager();
    $user = $UsersManager->connectAdmin($email, $pass_hache);

    adminSeeAllCats();
}

function adminSeeAllCats() {
    $PostsManager = new \BLOG\models\PostsManager();
    $posts = $PostsManager->getPostsAdmin();

    require('views/backend/adminView.php');
}

function addPostController($title,$text,$img,$categorie) {
    $PostsManager = new \BLOG\models\PostsManager();
    $post = $PostsManager->addPostModel($title,$text,$img,$categorie);

    require('views/backend/adminView.php');
}

