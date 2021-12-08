<?php 

require('forum\actions\database.php'); 

//Vérifier si l'id de la question est rentrée dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //Récuperer l'identification de la question 
    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion ));

    //Vérifier si la question existe 
    if($checkIfQuestionExists->rowCount() > 0) {

        //Récuperer toute les datas de la questions
        $questionsInfos = $checkIfQuestionExists->fetch();

        //Stocker les datas de la questions dans des variables propres.
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_publication_date = $questionsInfos['date_publication'];





    } else {
        $errorMsg = "Aucune question n'a été trouvée"; 
    }




}else{
    $errorMsg = "Aucune question n'a été trouvée";
}








?>