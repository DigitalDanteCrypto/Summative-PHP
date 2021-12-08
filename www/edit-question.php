<!DOCTYPE html>
<html lang="en">
<?php include('forum\includes\head.php'); ?>
<?php 
require('forum/actions/users/securityAction.php');
require('forum\actions\questions\getInfosOfEditedQuestionAction.php');
require('forum\actions\questions\editQuestionAction.php');
?>



<body>
    <?php include('forum\includes\navbar.php'); ?>

    <br><br>
    <div class="container">

        <?php
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
        }
        ?>


        <?php

        if (isset($question_content)) {
        ?>
            <form method="POST">


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<?=$question_title ?>">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" ><?=$question_description ?></textarea>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content"> <?=$question_content ?></textarea>

                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
                <br><br>







            </form>
        <?php


        }
        ?>














    </div>









</body>

</html>