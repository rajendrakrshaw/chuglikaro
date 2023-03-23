<?php
    include 'conn.php';

    $msg = $_POST['text'];
    $room = $_POST['room'];
    $ip = $_POST['ip'];

    $query = "INSERT INTO `msgs`( `msg`, `room_name`, `ip`) VALUES ('$msg','$room','$ip')";
    $res = mysqli_query($conn, $query);

?>