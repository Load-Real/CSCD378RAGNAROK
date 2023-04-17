<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Speakers</title>
    <link rel="stylesheet" href="Vendors.css">
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

    <li><a href="index.php">Home</a></li>
    <li><a href="rsvp.php">RSVP</a></li>
    <li><a class="active" href="speakers.php">Notable Speakers</a></li>
    <li><a href="vendors.php">Vendors</a></li>
</ul>
<section>
    <img src="/Dave.png" alt="It's Just Dave" style="width:500px;height:500px;">
    <br>
    Dave: Who doesn't know Dave.
</section>

<section>
    <img src="/Loki.jpg" alt="Chibi Loki" style="width:500px;height:500px;">
    <br>
    Loki: I'm sure he'll behave this time.
</section>

<section>
    <img src="/Odin.jpg" alt="Odin Playing ball" style="width:500px;height:500px;">
    <br>
    Odin: Though he made us promise not to interrupt his play time.
</section>
</html>
