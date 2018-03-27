<?php

namespace BLOG\models;

require_once("MainManager.php");

class UsersManager extends Main
{
    public function insertUser($prenom, $nom, $email, $pass_hache, $passConfirm)
    {
        $db = $this->dbConnect();

            // Insertion
            $req = $db->prepare('INSERT INTO user(id_user, prenom, nom, email, password) VALUES(NULL, :prenom, :nom, :email, :pass)');
                
            $user = $req->execute(array(
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'pass' => password_hash($pass_hache, PASSWORD_DEFAULT)
            ));

            return $user;

    }

    public function connectUser($email, $pass_hache)
    {
        $db = $this->dbConnect();

            // Insertion
            $req = $db->prepare('SELECT id_user, prenom, password FROM user WHERE email = :email');
            $req->execute(array(
                'email' => $email));
            $resultat = $req->fetch();
                
            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($pass_hache, $resultat['password']);

            if (!$resultat) {
                echo 'Mauvais identifiant ou mot de passe !';
            }
            else {
                if ($isPasswordCorrect) {
                    if (!session_id()) {
                        session_start();
                        $_SESSION['id_user'] = $resultat['id_user'];
                        $_SESSION['prenom'] = $resultat['prenom'];
                        $_SESSION['email'] = $email;
                    }
                    
                    
                }
                else {
                    echo 'Mauvais identifiant ou mot de passe !';
                }
            } 

    }

    public function connectAdmin($email, $pass_hache)
    {
        $db = $this->dbConnect();

            // Insertion
            $req = $db->prepare('SELECT id_user, prenom, password FROM user WHERE email = :email');
            $req->execute(array(
                'email' => $email));
            $resultat = $req->fetch();
                
            // Comparaison du pass envoyé via le formulaire avec la base
            $isPasswordCorrect = password_verify($pass_hache, $resultat['password']);

            if (!$resultat) {
                echo 'Mauvais identifiant ou mot de passe !';
            }
            else {
                if ($isPasswordCorrect) {
                    session_start();
                    $_SESSION['id_user'] = $resultat['id_user'];
                    $_SESSION['prenom'] = $resultat['prenom'];
                    $_SESSION['email'] = $email;
                }
                else {
                    echo 'Si vous êtes Admin connectez-vous!';
                }
            } 
    }

}
