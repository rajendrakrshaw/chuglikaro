<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "chuglikaro";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn)
        die("Failed to connect".mysqli_connect_error());
?>