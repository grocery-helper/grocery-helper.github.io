<?php

// <?php
//     $db_host = 'remotemysql.com';
//     $db_user = 'PVhTrKWdPv';
//     $db_pass = 'FaPy0Vt6oB';
//     $db_name = 'PVhTrKWdPv';
//

    include 'config.php';

    // Create connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    <html>
    // echo "Connected successfully";
    console.log("Connected successfully");
    </html>

?>
