<?php 

require('forum\actions\database.php');


//Récuperer l'identifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id= ?');
    $checkIfUserExists->execute(array($idOfUser));


    
    if($checkIfUserExists->rowCount() > 0){
    
        //Récuperer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];


        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));




    } else {
        $erroMsg = "Aucun utilisateur trouvé";
    }


} else {
    $errorMsg = "Aucun utilisateur trouvé";
}














?>