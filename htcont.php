<?php
    include 'conn.php';
    $room = $_POST['room'];
    $query = "select msg, sent, ip from msgs where room_name = '$room'";
    $html_content = ""; 
    $res = mysqli_query($conn,$query);
    $data="";
    if(mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res)){
            $data = $data.'<div class="container">';
            $data = $data.$row['ip'];
            $data = $data." says <p>".$row['msg'];
            $data = $data.'</p> <span class="time-right">'.$row['sent'].'</span></div>';

            
        }
    }
    echo $data;
?>