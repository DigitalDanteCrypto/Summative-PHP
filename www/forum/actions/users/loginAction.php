<?php
session_start();
require('forum\actions\database.php');

// Validation du formulaire
if(isset($_POST['validate'])){


    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);
        
        //Vérifier si l'utilisateur existe (si le pseudo existe)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        
        if($checkIfUserExists->rowCount() > 0) {
            //Récupérer les données de l'utilisateur 
            $userInfos = $checkIfUserExists->fetch();
            
            
            //Vérifier si les mots de passes sont correctes avec celle de la base de données.
            if(password_verify($user_password, $userInfos['mdp'])) {
            
            //authentifier l'utilisateur
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            //On redirige l'utilisateur vers la page d'acceuil 
            header('Location: ../index.php');

            } else {
                $errorMsg = "Votre mot de passe est incorrecte";
            }
        
        }else{
            $errorMsg = "Votre pseudo est incorrecte";
        }




        }else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }





?>




















?>