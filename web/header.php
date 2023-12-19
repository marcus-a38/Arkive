<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>The Arkive</title>
        <link rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" type="image/png" href="img/favicon.png">
    </head>

    <body>

        <nav class="navbar navbar-dark navbar-expand fixed-top border-bottom border-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" style="letter-spacing: 0.5px;">
                    <img src="img/navbar-icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    <b>The Arkive</b>
                </a>

                <!-- Nav menu -->
                <ul class="navbar-nav nav"> 

                    <?php if(isset($_SESSION['username'])): ?> <!-- Logged in -->

                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" id="user-menu" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']?></a>
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <?php if($_SESSION['usertype'] == 3): ?>
                                    <button class="dropdown-item" type="button">Admin</button>
                                <?php endif; ?>
                                <a class="dropdown-item" href="#">Activity&nbsp;&nbsp;<span id="notifications">0</span></a>
                                <a class="dropdown-item" href="logoutAction.php">Logout</a>
                            </div>
                            
                        </div>
                    </li> 
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="browse.php">Browse</a></li> 
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="#">Upload</a></li>
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="contact.php">Contact</a></li> 
                                
                    <?php else: ?> <!-- Not logged in -->
                    
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="login.php">Login</a></li> 
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="register.php">Register</a></li> 
                    <li class="nav-item"><a class="nav-link link-opacity-75-hover link-light" href="contact.php">Contact</a></li> 
                    
                    <?php endif; ?>

                </ul> 
                <!-- End nav menu -->
            </div>
        </nav>

        <div id="content">  <!-- start the page content -->
            <?php include 'loadAnim.php' ?>
            <div id="body" class="text-white">