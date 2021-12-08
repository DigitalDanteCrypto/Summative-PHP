<?php
session_start();
require('forum\actions\database.php');


// Validation du formulaire
if(isset($_POST['validate'])){


    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'],  PASSWORD_DEFAULT);  

        //Vérifier si l'utilisateur existe déjà
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo=? ');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        //Si l'utilisateur n'existe pas, l'enregistrer dans la base de donnés, sinon il recoit un message d'erreur.
        if($checkIfUserAlreadyExists->rowCount() == 0 ){

            //On enregistre les valeurs dans la base de donnés 
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp)VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password  ));


            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ?, AND prenom= ? AND pseudo = ? ');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo ));

            //On récupère les données dans une table
            $userInfos = $getInfosOfThisUserReq->fetch();
            
            //On authentifie l'utilisateur dans la session sur le site 
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];

            //On redirige l'utilisateur vers la page d'accueil
            header('Location: index.php');



        }else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }



}