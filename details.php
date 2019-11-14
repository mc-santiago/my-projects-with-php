<?php

include('config/db_connect.php');

// Delete Button
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM projects WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // success
        header('Location: index.php');
    } else {
        // failure
        echo 'query error: ' . mysqli_error($conn);
    }
}

// Check GET request id param
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM projects WHERE id = $id";

    // get the query results
    $result = mysqli_query($conn, $sql);

    // fetch result in array form
    $project = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
    
    <?php include('templates/header.php') ?>

    <main class="container center">
        <?php if($project) { ?>
            <h4 class="brand-text"><b><?php echo htmlspecialchars($project['title']); ?></b></h4>
            <p><?php echo htmlspecialchars($project['description']); ?> <p> 
            <p>Created by: <?php echo htmlspecialchars($project['email']); ?> <p>
            <p>Languages: <?php echo htmlspecialchars($project['languages']); ?> <p>
            <p>Project added on: <?php echo htmlspecialchars($project['timestamp']); ?> <p> 
            <h5>Website: <a href="<?php echo htmlspecialchars($project['website']); ?>"><?php echo htmlspecialchars($project['website']); ?> </a><h5> 

            <!-- Delete Form -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $project['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand">
            </form>
        <?php } else { ?>
            <h5>Project not found.</h5>
        <?php }; ?>
    </main>

    <?php include('templates/footer.php') ?>

</html>