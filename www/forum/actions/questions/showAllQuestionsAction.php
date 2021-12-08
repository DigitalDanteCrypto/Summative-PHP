<?php 


require('forum\actions\database.php');

//Récupérer les questions par défault sans la recherche 
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');


//Vérifier si une recherche a été rentrée par l'utilisateur 
if(isset($_GET['search']) AND !empty($_GET['search'])) {

    //La recherche de l'utilisateur
    $usersSearch = $_GET['search'];


    //Récupérer toute les questions qui correspondes à la recherche de l'utilisateur (en fonction du titre)
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC ');
    


} 
















?>