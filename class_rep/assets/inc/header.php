<?php
    session_start();
    if(!isset($_SESSION['class_rep_id'])){
        header("location: ../class_rep.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Hall Booking</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <nav class = "navbar navbar-expand-md navbar-dark my-background">
        <a href="index.php" class = "navbar-brand">Lecture Hall Booking</a>
        <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarCollapse">
            <div class = "navbar-nav">
                <a href="index.php" class = "nav-item nav-link">Home</a>
                <a href="your_bookings.php" class = "nav-item nav-link">Your Bookings</a>
                <a href="logout.php" class = "nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>