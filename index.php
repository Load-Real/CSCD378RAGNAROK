<?php
if(isset($_COOKIE["returning"]) AND strcmp($_COOKIE["returning"], "false")){
    setcookie("returning", "true", time() + (86400 * 30), "/");
} else {
    setcookie("returning", "false", time() + (86400 * 30), "/");
}
session_start();

include "db_conn.php";
include 'logging.php';
if(isset($_COOKIE["returning"]) AND strcmp($_COOKIE["returning"], "true")){
    echo"Welcome Back Returning User!";
} else {
    echo "Welcome New User!";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ragnarok</title>
    <link rel="stylesheet" href="BaseSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<header>
    Ragnarok
    <p id="def">Time until Ragnarok: </p>
    <p id="timer"></p>
    <script>
        //help came from https://www.w3schools.com/howto/howto_js_countdown.asp
        //sets the fontsize
        $(document).ready(function() {
            $("#def").css("font-size", 15)
            $("#timer").css("font-size",20 );
        });
        //random date for the end
        const ragnarokDate = new Date("Jun 30 20000 10:30:10");
        //timer loop
        $(document).ready(function loop (){

            const timer = $("#timer");

            //calculate the difference in time
            const currentDate = Date.now();
            const dateDifference = ragnarokDate - currentDate;
            const days = Math.floor(dateDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor(dateDifference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            const minutes = Math.floor(dateDifference % (1000 * 60 * 60) / (1000 * 60));
            const seconds =  Math.floor(dateDifference % (1000 * 60) / (1000));

            //animate the text so that it pops in and out
            timer.animate({
                opacity: "1"
            },0);
            timer.text(days + " Days, " + hours + " Hours, " + minutes + " Minutes, " + seconds + " Seconds ");
            timer.animate({
                opacity: "0.4"
            });
            //loops every second
            setTimeout(loop,1000);
        });

    </script>
</header>
    <ul>
        <?php
        if(!isset($_SESSION['id'])) {?>
            <li><a href="login.php">Login</a></li>
        <?php }
        else {?>
            <li><a href="logout.php">Logout</a></li>

        <?php }?>

        <?php
        if(isset($_SESSION['admin']) and $_SESSION['admin'] === '1'){?>
            <li><a href='admin.php'>Admin Controls</a></li>
        <?php }?>

        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="rsvp.php">RSVP</a></li>
        <li><a href="speakers.php">Notable Speakers</a></li>
        <li><a href="vendors.php">Vendors</a></li>
    </ul>
<section>
    Ragnarok is the Norse end times.
    <br>
    When Loki decides it is time he shall start Ragnarok along with his many, MANY children.
    <br>
    All of the events scheduled for the day are open to change due to the many different interpretations of the event.
    <br>
    We welcome you to come join us as the world ends and the sun is extinguished and war among gods and their enemies pulls the world into peril.
    <br>
    We hope you enjoy the event and enjoy reading about some of the people that will be there and what they intend to do.
</section>
