<?php
require('conn.php'); // Include your database connection file
session_start(); // Start the session

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple SQL query to select user
    $query = "SELECT id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Check if the user exists and verify the password
        if ($user && password_verify($password, $user['password'])) {
            // Store user ID in session
            $_SESSION['user_id'] = $user['id'];

            header(" Location: ../"); // Redirect after successful login
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
