<?php include 'config/database.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="/index.php" class="logo">My Website</a>
            <ul class="nav-links">
                <li><a href="/index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#cards-container">lawyers</a></li>
                <?php
                // check if the user is logged in as a lawyer
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'lawyer') {
                    echo '<li><a href="edit_profile.php">Edit Profile</a></li>';
                }
                ?>
                <?php
                // check if the user is not logged in
                if (!isset($_SESSION['user_id']) or !isset($_SESSION['lawyer_id'])) {
                    echo '<li><a href="login.php">Log in</a></li>
                      <li><a href="signup.php">Sign up</a></li>';
                } else {
                    echo '<li><a href="logout.php">Log out</a></li>';
                }
                ?>
            </ul>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </nav>