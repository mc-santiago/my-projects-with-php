<?php
// POST METHOD.... 
// htmlspecialchars is a security measure... example: echo htmlspecialchars($_POST['email']);

$email = $title = $image = $description = $languages = '';
$errors = array('email'=>'', 'title'=>'', 'image'=>'', 'description'=>'', 'languages'=>'');

if(isset($_POST['submit'])) {

    // Check email
    if(empty($_POST['email'])) {
        $errors['email'] = "An email is required <br />";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Must enter a valid email address.';
        }
    }

    // Check title
    if(empty($_POST['title'])) {
        $errors['title'] = "A title is required <br />";
    } else {
        $title = $_POST['title'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
			$errors['title'] = 'Title must be letters and spaces only.';
		}
    }

    // Check image url
    if(empty($_POST['image'])) {
        $errors['image'] = "An image url is required <br />";
    } else {
        $image = $_POST['image'];
        if(!filter_var($image, FILTER_VALIDATE_URL)){
            $errors['image'] = 'Must enter a valid URL.';
        }
    }

    // Check description
    if(empty($_POST['description'])) {
        $errors['description'] = "A description is required <br />";
    } else {
        $description = $_POST['description'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['description'] = 'Description must be letters and spaces only.';
			}
    }

    // Check languages
    if(empty($_POST['languages'])) {
        $errors['languages'] = "At least one language is required <br />";
    } else {
        $ingredients = $_POST['languages'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $languages)){
    		$errors['languages'] = 'Languages must be a comma separated list';
		}
    }

    // If no error, form is valid. Redirect to homepage.
    if(array_filter($errors)){
        echo 'There are errors in the form.';
    } else {
        header('Location: index.php');
    }

} // end of POST check



?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Add a New Project</h4>
        <form action="add.php" method="POST" class="white">
            <!-- Email -->
            <label>Email: </label>
            <div class="red-text">
                    <?php echo $errors['email']; ?>
                </div>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <!-- Project Title -->  
            <label>Project title: </label>
                <div class="red-text">
                    <?php echo $errors['title']; ?>
                </div>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <!-- Image URL -->    
            <label>Image URL: </label>
                <div class="red-text">
                    <?php echo $errors['image']; ?>
                </div>
            <input type="text" name="image" value="<?php echo htmlspecialchars($image) ?>">
            <!-- Description -->
            <label>Description: </label>
                <div class="red-text">
                    <?php echo $errors['description']; ?>
                </div>
            <input type="text" name="description" value="<?php echo htmlspecialchars($description) ?>">
            <!-- Languages used -->    
            <label>Launguages used (comma separated): </label>
                <div class="red-text">
                    <?php echo $errors['languages']; ?>
                </div>
            <input type="text" name="languages" value="<?php echo htmlspecialchars($languages) ?>">
                
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('templates/footer.php') ?>


</html>