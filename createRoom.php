<?php
    $room = $_POST['roomName'];
    if(strlen($room) > 20 or strlen($room) < 2 ){
        $message = "Please choose a name between 2 to 20 character.";
        echo "<script>alert('$message');</script>";
        header("refresh:0.1;url=http://localhost/chuglikaro" );
    }else if(!ctype_alnum($room)){
        $message = "Choose an alphanumeric room name.";
        echo '<script>alert("$message");</script>';
        header("refresh:0.1;url=http://localhost/chuglikaro" );
    }else{
        include 'conn.php';
    }
    $query = "select * from rooms where room_name='$room'";
    $res = mysqli_query($conn, $query);
    if($res){
        if(mysqli_num_rows($res) > 0){
            $message = "Room already exists.";
            echo "<script>alert('$message');</script>";
            header("refresh:0.1;url=http://localhost/chuglikaro" );
        }else{
            $query = "insert into `rooms` (`room_name`) values('$room')";
            if(mysqli_query($conn, $query)){
                $message = "Kamra taiyaar hai, chugli suru karo.";
                echo "<script>alert('$message');</script>";
                header("refresh:0.1;url=http://localhost/chuglikaro/rooms.php?room=".$room);
            }
        }
    }else{
        echo mysqli_error($conn);
    }
?>