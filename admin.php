<?php
session_start();
include 'db_conn.php';
include 'logging.php';

// prevents non-admins from accessing the page
if(!isset($_SESSION['id']) or !isset($_SESSION['admin']) or $_SESSION['admin'] !== "1") {
    errorLog("Tried to access admin page.");
    die;
}

//check if the csv log file already exists
//if it does remove it and create a new one
//error logs
if(@file('error_log.csv')){
    unlink('error_log.csv');
    $connection->query("select * from error_log into outfile '../../www/error_log.csv' fields enclosed by ',' lines terminated by '\n'");

}else {
    $connection->query("select * from error_log into outfile '../../www/error_log.csv' fields enclosed by ',' lines terminated by '\n'");
}
//login logs
if(@file('login_log.csv')){
    unlink('login_log.csv');
    $connection->query("select * from login_log into outfile '../../www/login_log.csv' fields enclosed by ',' lines terminated by '\n'");

}else {
    $connection->query("select * from login_log into outfile '../../www/login_log.csv' fields enclosed by ',' lines terminated by '\n'");
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="BaseSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<header>
    Admin Page
</header>
<section id="sec">
    <div>
    <a href="error_log.csv">error log</a>
    <div>
    <a href="login_log.csv">login log</a>
    <div>
</section>

</script>
</html>
