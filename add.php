<?php

if ( isset($_POST['submit']) ) {
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['title']);
    echo htmlspecialchars($_POST['image']);
    echo htmlspecialchars($_POST['description']);
    echo htmlspecialchars($_POST['languages']);
}

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add a New Project</h4>
        <form action="add.php" method="POST" class="white">

            <label>Email: </label>
            <input type="text" name="email">

            <label>Project title: </label>
            <input type="text" name="title">

            <label>Image URL: </label>
            <input type="text" name="image">

            <label>Description: </label>
            <input type="text" name="description">

            <label>Launguages used (comma separated): </label>
            <input type="text" name="languages">

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>


</html>