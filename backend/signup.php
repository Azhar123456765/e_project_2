<?php
require('conn.php');
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO users( username, email, password) VALUES ('$username','$email','$password')";
    mysqli_query($conn, $query);
    $_SESSION['user_id'] = $username;
    header("Location: ../");
    exit();
}

?>