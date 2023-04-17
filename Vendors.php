<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vendors</title>
    <link rel="stylesheet" href="Vendors.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<header>
    Ragnarok
    <p id="def">Time until Ragnarok: </p>
    <p id="timer"></p>
    <script>
        //help came from https://www.w3schools.com/howto/howto_js_countdown.asp
        $(document).ready(function() {
            $("#def").css("font-size", 15)
            $("#timer").css("font-size",20 );
        });
        const ragnarokDate = new Date("Jun 30 20000 10:30:10");
        $(document).ready(function loop (){
            const timer = $("#timer");


            const currentDate = Date.now();
            const dateDifference = ragnarokDate - currentDate;

            const days = Math.floor(dateDifference / (1000 * 60 * 60 * 24));
            const hours = Math.floor(dateDifference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            const minutes = Math.floor(dateDifference % (1000 * 60 * 60) / (1000 * 60));
            const seconds =  Math.floor(dateDifference % (1000 * 60) / (1000));
            timer.animate({
                opacity: "1"
            },0);
            timer.text(days + " Days, " + hours + " Hours, " + minutes + " Minutes, " + seconds + " Seconds ");
            timer.animate({
                opacity: "0.4"
            });
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
    <li><a href="speakers.php">Notable Speakers</a></li>
    <li><a class="active" href="vendors.php">Vendors</a></li>
</ul>

<section>
    <img src="/PizzaHut.jpg" alt="Pizza Hut Icon" style="width:500px;height:500px;">
    <br>
    Pizza Hut: Let's be honest they will probably still be around then anyway.
</section>

<section>
    <img src="/NBC.png" alt="Norse Brewing Company Icon" style="width:500px;height:500px;">
    <br>
    Norse Brewing Company: Norse Brewing Company prides itself on its three pillars of Beer, Food, and Family.
</section>

<section>
    <img src="/OliveGarden.jpg" alt="Olive Garden Icon" style="width:500px;height:500px;">
    <br>
    Olive Garden: Because why not include the italians.
</section>

<section>
    <img src="/TRH.jpg" alt="Texas Roadhouse Icon" style="width:500px;height:500px;">
    <br>
    Texas Roadhouse: They threatened us so we had to include them.
</section>


