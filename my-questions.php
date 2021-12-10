<?php
require('forum/actions/users/securityAction.php'); 
require('forum/actions/questions/myQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include('forum\includes\head.php'); ?>

<body>
    <?php include('forum\includes\navbar.php'); ?>

<div class="container">
<br><br>
    <?php

    while ($question = $getAllMyQuestions->fetch()) {
    ?>
        <div class="card">
            <h5 class="card-header">
                <a href="article.php?id=<?= $question['id']; ?>">
                <?= $question['titre'] ?>
                </a>
            </h5>
            <div class="card-body">
                
                <p class="card-text"><?php echo $question['description'] ?></p>
                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
                <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                <a href="forum/actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
            </div>
        </div>
    <?php
    }
    ?>

</div>
</body>
</html>