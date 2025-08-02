<?php

include 'connection.php';



if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin login
    $adminQuery = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $adminResult = mysqli_query($conn, $adminQuery);

    if (mysqli_num_rows($adminResult) == 1) {
        $_SESSION['admin_email'] = $email;
        header("Location: admin_dashboard.php");
        exit();
    }

    // Student login
    $studentQuery = "SELECT * FROM students WHERE email='$email' AND password='$password'";
    $studentResult = mysqli_query($conn, $studentQuery);

    if (mysqli_num_rows($studentResult) == 1) {
        $_SESSION['student_email'] = $email;
        header("Location: student_dashboard.php");
        exit();
    }

    // Login failed
    echo "<script>alert('Invalid email or password'); window.location='login.php';</script>";
}


?>