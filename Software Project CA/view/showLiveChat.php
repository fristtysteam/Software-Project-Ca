<!--------------------------
Created by: Julie Olamijuwon
Date:       April 2024
---------------------------->
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatBox</title>
    <!--Bootsrap css link
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">

    <!--Fontawesome css link
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS for full calender
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery
    <script type="text/javascript" src="../scripts/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-GLhlTQ8iQFZK3d6PJKzutOz9w8a/+LXRvM5Ae0iYTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"></script>-->
<?php

include 'header.php';
include "nav2.php";
?>
    <script>
        //STEP2 AMENDED
        function submitChat(){
            if(form1.uname.value === '' || form1.msg.values === '' ){
                alert("All fields are required !");
            }

            form1.uname.readyState = true,
                form1.uname.style.border='none';

            var uname = encodeURIComponent(form1.uname.values);
            var msg = encodeURIComponent(form1.msg.values);
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function (){
                if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
                    document.getElementById('chatlog').innerHTML = xmlhttp.responseText;
                }
            }
           // xmlhttp.open('GET', 'insert.php?uname='+uname+'&msg='+msg, true);
            xmlhttp.open('GET', 'showLiveChat.php?uname='+uname+'&msg='+msg, true);
            xmlhttp.send();
        }
        // Time lag function
        $(document).ready(function(e){
            $.ajaxSetup({cache:false});
            setInterval(function(){$('#chatlog').load(log.php);},2000);
        });
    </script>

<!--</head>
<body>-->
<?php
//YouTube Link: https://www.youtube.com/watch?v=pdy9JOhey0E
?>
<div class="py-5">
    <div class="row justify-content-center">
   <!-- <div class="container justify-content-center"> -->
        <div class="col col-md-8 ">
            <div class="card ">
                <div class="card-header">
                    <h4 class="fw-bold">Live Chat</h4>
                    <i class=" fa fa-solid fa-comments-question-check"></i>
                </div>
                <div class="card-body bg-secondary">
                    <form  name="form1" method="post" action="../controller/index.php">
                        <input type="hidden" value="do_chat" name="action">
                        <input class="form-control"  type="text" name="uname" placeholder="Enter Your name."/>
                        <textarea class="form-control mt-3 " name="msg" placeholder="Type Message to send ..."></textarea>
                        <button class="btn btn-primary mt-3" onclick="submitChat()" name="do_chat">Send</button>
                        <div id="chatlog"  class="form-control mt-3 fw-bold" >
                            <?php
                            //if(isset($_POST['do_chat'])) {
                                $returnedChat = getAllChat();
                                foreach ($returnedChat as $row ){
                                    echo $row['name'] .' : &nbsp'. $row['message'].'&nbsp'.$row['date'].'<br>';
                                    //echo $row;
                                //}
                            }
                            ?>
                            Loading chatlog please wait ...

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include 'footer.php';

?>
<!--</body>
</html>-->


