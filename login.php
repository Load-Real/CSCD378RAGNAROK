<?php
//Source Code: https://www.simplilearn.com/tutorials/php-tutorial/php-login-form
//session_start();
//include "db_conn.php";
//
//if(isset($_POST['user']) && isset($_POST['password'])) {
//    function validate($data) {
//        $data = trim($data);
//        $data = stripslashes($data);
//        $data = htmlspecialchars($data);
//        return data;
//    }
//}
//
////$user = validate($_POST['user']);
////$password = validate($_POST['password']);
//
//$password = md5($password);
//if(empty($user)) {
//    header("Location: index.php?error=Username is required"); //Checking if entry in Username
//    exit();
//}
//else if(empty($password)) {
//    header("Location: index.php?error=Password is required"); //Checking if entry in Password
//    exit();
//}
//
//$sql = "SELECT * FROM users WHERE user_name='$user' AND password='$password'";
//
//$result = mysqli_query($connection, $sql);
//
////Runs if user and pass match
//if (mysqli_num_rows($result) === 1) {
//    $row = mysqli_fetch_assoc($result);
//    if($row['user_name'] === $user && $row['password'] === $password) {
//        echo "Logged In";
//        $_SESSION['user_name'] = $row['user_name'];
//        $_SESSION['name'] = $row['name'];
//        $_SESSION['id'] = $row['id']; //id will also be a field in the DB
//        header("Location: home.php");
//        exit();
//    }
//    else {
//        header("Location: index.php?error=Invalid Username or Password");
//    }
//}
//else {
//    header("Location index.php");
//    exit();
//}
session_start();
include "db_conn.php";
include "logging.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "select * from users where username = '$username' limit 1";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] === $password) {
                loginLog(1, $username);
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['admin'] = $user_data['admin'];
                header("Location: index.php");
                die; //Kills login session once you're in
            }
        }
    }
    echo "Invalid Credentials!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Login.css">
    <title>LOGIN</title>
</head>
<body>

<h2>Login Form</h2>

<form action="/login.php" method="post">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <button type="submit" value="Login">Login</button>
        <div>
            New user? <button type="button" class="sign-up"><a href="signup.php">Sign Up</a></button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="index.php">Cancel</button>
        </div>
</form>

</body>
</html>
