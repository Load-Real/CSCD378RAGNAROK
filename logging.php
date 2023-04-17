<?php

//logs errors to the database
function errorLog ($errMessage) {
    include 'db_conn.php';
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = $connection->query("insert into error_log (IPAddress, errorTime, errorDate, errorMessage) values('$ip',CURRENT_TIME,CURRENT_DATE,'$errMessage')");
}

function loginLog ($messageType,$currentUser) {
    include 'db_conn.php';
    $ip = $_SERVER['REMOTE_ADDR'];
    if($messageType == 1) {
        $query = $connection->query("insert into login_log (IPAddress,loginUser, loginTime, loginDate,loginMessage) values ('$ip','$currentUser',CURRENT_TIME,CURRENT_DATE,'logged in')");
    }elseif ($messageType == 0) {
        $query =$connection->query("insert into login_log (IPAddress,loginUser, loginTime, loginDate,loginMessage) values ('$ip','$currentUser',CURRENT_TIME,CURRENT_DATE,'logged out')");
    }
}



