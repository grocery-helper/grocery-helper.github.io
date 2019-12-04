<?php
    session_start();
    session_destroy();
    header("Location: http://localhost:8080/grocery-helper.github.io/index.php");
?>