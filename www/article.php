<?php
session_start();
require('forum\actions\questions\showArticleContentAction.php');
require('forum\actions\questions\postAnswerAction.php');
require('forum\actions\questions\showAllAnswersOfQuestionAction.php');  ?>

<!DOCTYPE html>
<html lang="en">


<?php include('forum\includes\head.php'); ?>



<body>

    <?php include('forum\includes\navbar.php'); ?>
    <br><br>


    <div class="container">




        <?php

        if (isset($errorMsg)) {
            echo $errorMsg;
        };

        if (isset($question_publication_date)) {
        ?>
            <section class="show-content">
                <h3><?= $question_title ?></h3>
                <hr>
                <p><?= $question_content ?></p>
                <hr>
                <small><?= "Utilisateur: " . ' ' . $question_pseudo_author . ' ' . $question_publication_date ?> </small>
            </section>
            <br><br>
            <section class="show-answers">

                <form class="form-group" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Répondre à cette question :</label>
                        <textarea name="answer" class="form-control"></textarea>
                        <br>
                        <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                    </div>
                </form>
                <br><br>

                <?php
                //Afficher tout les éléments qui ont été récuperer lors de la requête
                while ($answer = $getAllAnswersOfThisQuestion->fetch()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $answer['pseudo_auteur']; ?>
                        </div>
                        <div class="card-body">
                            <?= $answer['contenu']; ?>
                        </div>
                        <br>
                    </div>
                    <br><br>
                <?php
                }
                ?>



            </section>

        <?php
        }
        ?>






    </div>








</body>

</html>