<?php

require('controllers/frontendController.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'allPosts') {
            allPosts();
        }
        elseif ($_GET['action'] == 'signUp') {
            if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass-confirm'])) {
                signUp($_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['pass'],$_POST['pass-confirm']);
            }
            else {
                throw new Exception('il faut tout remplir');
            }
        }
        elseif ($_GET['action'] == 'signIn') {
            if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                signIn($_POST['email'],$_POST['pass']);
            }
            else {
                throw new Exception('il faut tout remplir');
            }
        }
        elseif ($_GET['action'] == 'admin') {
            admin(); 
        }
        elseif ($_GET['action'] == 'connectAdmin') {
            if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                connectAdmin($_POST['email'],$_POST['pass']);
            }
            else {
               header('Location: index.php?action=admin');
            }
        }
        elseif ($_GET['action'] == 'addPost') {
            if (!empty($_POST['title']) && !empty($_POST['text']) && !empty($_FILES["imgToUpload"]) && !empty($_POST['categorie'])) {
                addPostController($_POST['title'],$_POST['text'],$_FILES["imgToUpload"],$_POST['categorie']);
                var_dump($_POST['title'],$_POST['text'],$_FILES["imgToUpload"],$_POST['categorie']);
            }
            else {
                throw new Exception('Il faut tout remplir');
            }
        }
    }
    else {
        allPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
