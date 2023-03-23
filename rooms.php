<?php
    $roomname = $_GET['room'];
    include 'conn.php';

    $query = "select * from `rooms` where room_name='$roomname'";
    $res = mysqli_query($conn, $query);
    if($res){
        if(mysqli_num_rows($res) == 0){
            $message = "Ye kamra nahi banaya gaya hai. Kripya naya kamra banale.";
            echo "<script>alert('$message');</script>";
            header("refresh:0.1;url=http://localhost/chuglikaro/rooms.php?room=".$room);
        }else{?>
            <!DOCTYPE html>
            <html>
            <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="./css/style.css">
            <style>
            body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
            }

            .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            }

            .darker {
            border-color: #ccc;
            background-color: #ddd;
            }

            .container::after {
            content: "";
            clear: both;
            display: table;
            }

            .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
            }

            .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
            }

            .time-right {
            float: right;
            color: #aaa;
            }

            .time-left {
            float: left;
            color: #999;
            }
            </style>
            </head>
            <body>

            <h2>Chat Messages - <?php echo $roomname;?></h2>
            
           
            
            <div class="container">
            <div class="anyClass">
            <div class="container darker">
            
            <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
            <span class="time-left">11:05</span>
            </div>
            </div>
            <input type="text" class="form-contol" name="usermsg" id="usermsg" placeholder="Enter your message">
            <button class="btn btn-default" name="submitmsg" id="submitmsg">Send</button>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <Script>
                setInterval(() => {
                    $.post("htcont.php", {room: '<?php echo $roomname; ?>'},
                        function(data, status){
                            document.getElementsByClassName('anyClass')[0].innerHTML = data;
                        }
                    )
                }, 1000);



                $("#submitmsg").click(function(){
                    var clientmsg = $("#usermsg").val();
                    $.post("postmsg.php", {text: clientmsg, room:'<?php echo $roomname; ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR'] ; ?>'},
                    
                    function(data, status){
                        document.getElementsByClassName('anyClass')[0].innerHTML = data;});
                        $("#usermsg").val("");
                    return false;
                });
            
            </Script>
            
            </body>

            </html>
        <?php
        }
    }else{
        echo "Error: ".mysqli_error($conn);
    }
?>