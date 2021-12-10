<?php
session_start();
require('forum\actions\users\showOneUsersProfileAction.php'); ?>

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
        }

        if (isset($getHisQuestions)) {

        ?>
            <div class="card">
                <div class="card-body">
                    <h4>@<?= $user_pseudo; ?></h4>
                    <p><?= $user_firstname . ' ' . $user_lastname; ?></p>
                </div>
            </div>
            <br>
            
            <?php
            while ($question = $getHisQuestions->fetch()) {
            ?>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <?= $question['titre']; ?>
                    </div>
                    <br>
                    
                    <div class="card-body">
                        <?= $question['description']; ?>
                    </div><br>
                    
                    <div class="card-footer">
                        Par <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication']; ?>
                    </div>
                    <br><br>
                </div>
        <?php
        }
        }
        ?>
    </div>
</body>

</html>