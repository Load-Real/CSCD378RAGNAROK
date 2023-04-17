<?php
include 'logging.php';
session_start();

//checks if the user exists
if (isset($_SESSION['id'])) {
    //remove log files if they exist
    if(@file_exists('error_log.csv'))
        unlink('error_log.csv');
    if(@file_exists('login_log.csv'))
        unlink('login_log.csv');
    //log the logout
    loginLog(0,$_SESSION['username']);

    unset($_SESSION['id']);
    unset($_SESSION['admin']);
    unset($_SESSION['username']);
}

//session_unset();
//session_destroy();

header("Location: index.php");