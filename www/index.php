<?php

session_start();
require('forum\actions\questions\showAllQuestionsAction.php');

?>


<!DOCTYPE html>
<html lang="en">

<?php include('forum\includes\head.php'); ?>

<body>

    <?php include('forum\includes\navbar.php'); ?>
    
<br><br>
<div class="container">
    <h1>Welcome to ASKBOX</h1>
    <form method="GET">
        <div class="form-group row">


        <div class="col-8">
            <input type="search" name="search" id="" class="form-control">
        </div>
        <div class="col-4">
            <button class="btn btn-success" type="submit">Rechercher</button>
        </div>




        </div>
    </form>


    <br>

    <?php 
    while($question = $getAllQuestions->fetch()){
        ?>
        <br><br>
        <div class="card">
            <div class="card-header">
            <a href="article.php?id=<?= $question['id']; ?>">
                <?= $question['titre'];?>
            </a>
            </div>
            <br>
            <div class="card-body">
            <?php echo $question['description'];  ?>
            </div>
            <br>
            <div class="card-footer">
            Publié par <a href="profile.php?id=<?= $question['id_auteur']?>"><?php echo $question['pseudo_auteur'];  ?></a> le <?php echo $question['date_publication'];  ?>
            </div>
            <br>
        </div>



        <?php 
    }


    ?>






</div>











</body>

</html>