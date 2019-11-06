<?php
// POST METHOD.... htmlspecialchars is a security measure... example: echo htmlspecialchars($_POST['email']);
if ( isset($_POST['submit']) ) {

    // Check email
    if(empty($_POST['email'])) {
        echo "An email is required <br />";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Must enter a valid email address.';
        }
    }

    // Check title
    if(empty($_POST['title'])) {
        echo "A title is required <br />";
    } else {
        $title = $_POST['title'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
			echo 'Title must be letters and spaces only.';
		}
    }

    // Check image url
    if(empty($_POST['image'])) {
        echo "An image url is required <br />";
    } else {
        $image = $_POST['image'];
        if(!filter_var($image, FILTER_VALIDATE_URL)){
            echo 'Must enter a valid URL.'
        }
    }

    // Check description
    if(empty($_POST['description'])) {
        echo "A description is required <br />";
    } else {
        $description = $_POST['description'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				echo 'Description must be letters and spaces only.';
			}
    }

    // Check languages
    if(empty($_POST['languages'])) {
        echo "At least one language is required <br />";
    } else {
        $ingredients = $_POST['languages'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $languages)){
    		echo 'Languages must be a comma separated list';
		}
    }
} // end of POST check



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