<?php 
    require('forum/actions/users/securityAction.php');
    require('forum/actions/questions/publishQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include('forum\includes\head.php'); ?>

<body>

    <?php include('forum\includes\navbar.php'); ?>
    
    <form class="container" method="POST">

        <?php 
        if (isset($errorMsg)) {
            echo '<p>' . $errorMsg . '</p>';
            } elseif(isset($successMsg)) {
                echo '<p>' . $successMsg . '</p>';
            }
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea  class="form-control" name="description"></textarea>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea class="form-control" name="content"></textarea>

        </div>
        <br><br>
        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
        <br><br>
    </form>

</body>

</html>