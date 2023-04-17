<?php
session_start();

include "db_conn.php";
include "logging.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>RSVP</title>
    <link rel="stylesheet" href="BaseSS.css">
    <link rel="stylesheet" href="rsvp.css">
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
    //display the login or logout button depending on what state the user is in
    if(!isset($_SESSION['id'])) {?>
        <li><a href="login.php">Login</a></li>
    <?php }
    else {?>
        <li><a href="logout.php">Logout</a></li>

    <?php }?>

    <?php
    //checks if user is an admin and if so display the admin icon
    if(isset($_SESSION['admin']) and $_SESSION['admin'] === '1'){?>
        <li><a href='admin.php'>Admin Controls</a></li>
    <?php }?>

    <li><a href="index.php">Home</a></li>
    <li><a class="active" href="rsvp.php">RSVP</a></li>
    <li><a href="speakers.php">Notable Speakers</a></li>
    <li><a href="vendors.php">Vendors</a></li>
</ul>
<section>
    <p class="rsvp_text">Reserve a spot at RAGNAROK!</p>
    <form action="/rsvp.php" method="post">
        <div class="container">
            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" fname="fname" required>

            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" lname="lname" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" email="email" required>

            <label for="ssn"><b>SSN</b></label>
            <input type="text" placeholder="Enter SSN" ssn="ssn" required>
            <button class="rsvp" type="submit">RSVP</button>
        </div>
    </form>
</section>
<footer>
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST") {

        echo "You're now signed up for RAGNAROK!";
        die;

    }?>
</footer>
</html>
