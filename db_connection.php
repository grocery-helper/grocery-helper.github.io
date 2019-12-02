<?php

    include 'config.php';

    // Create connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if (!$conn) {
        die("Connection failed: ");
    }
    echo "Connected successfully";


?>
