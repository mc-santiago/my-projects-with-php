<?php

include('config/db_connect.php');

// Write query for all projects
$sql = 'SELECT * FROM projects';

// Make query and get result
$result = mysqli_query($conn, $sql);

// Fetch the resulting rows as an array
$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php') ?>
    <main>

    <h4 class="center brand-text shadow"><b>Projects</b></h4>

    <div class="container ">
        <div class="row">
            <!-- Each Card -->
            <?php foreach($projects as $project){ ?>
                <div class="col s6 md3">
                    <div class="card large">
                        <!-- Image Div-->
                        <div class="card-image">
                        <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="project <?php echo htmlspecialchars($project['title']); ?>">
                        </div>
                        <!-- Content Div-->
                        <div class="card-content center">
                            <h5 class="activator"><?php echo htmlspecialchars($project['title']); ?></h5>
                            <p> <?php echo htmlspecialchars($project['description']); ?></p>
                            <br/>
                            <p>Languages used: <?php echo htmlspecialchars($project['languages']); ?></p>
                        </div>
                        <!-- Extra Content -->
                        <div class="card-action center">
                            <a href="details.php?id=<?php echo $project['id'] ?>" class="brand-text">Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </main>

    <?php include('templates/footer.php') ?>


</html>