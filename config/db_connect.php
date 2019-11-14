<?php
// connect to database
$conn = mysqli_connect('localhost', 'mc-santiago', 'Testing123', 'my-projects-with-php');

// Check Connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>