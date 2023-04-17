<?php
session_start();
include "db_conn.php";

//Checks if something was posted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //Check if submitted username and password are empty or not
    if (!empty($username) && !empty($password)) {
        $id = rand(pow(10, 1), pow(10, 4));

        $query = "insert into users (username, password, dateJoined, admin, id) values ('$username', '$password', current_date, 0, '$id')";
        mysqli_query($connection, $query);

        header("Location: login.php"); //Redirect to login page to allow user to login with new credentials
        die;
    } else {
        echo "Please create a valid username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/Signup.css">
    <title>SIGNUP</title>
</head>
<body>

<h2>Signup Form</h2>

<form action="/signup.php" method="post">

    <div class="container">
        <label for="uname"><b>Create username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Create password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" value="Sign-up">Create Account</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn"><a href="login.php">Cancel</button>
    </div>
</form>

</body>
</html>
