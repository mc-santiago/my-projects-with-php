<?php
// connect to database
$conn = mysqli_connect('localhost', 'mc-santiago', 'Testing123', 'my-projects-with-php');

// Check Connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

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

    <h4 class="center grey-text">Projects</h4>

    <div class="container">
        <div class="row">
            <?php foreach($projects as $project){ ?>
                <div class="col s6 md3">
                    <div class="card">
                        <div class="card-content center">
                            <h5> <?php echo htmlspecialchars($project['title']); ?></h5>
                            <img class="col s12 center" src="<?php echo htmlspecialchars($project['image']); ?>" alt="project <?php echo htmlspecialchars($project['title']); ?>">
                            <p> <?php echo htmlspecialchars($project['description']); ?></p>
                            <br/>
                            <p>Languages used: <?php echo htmlspecialchars($project['languages']); ?></p>
                        </div>
                        <div class="card-action center">
                            <a href="#" class="brand-text">Website</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('templates/footer.php') ?>


</html>