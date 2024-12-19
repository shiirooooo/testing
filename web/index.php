<?php
    $title = "SOUTHSIDE";
    $welcomeMessage = "Selamat datang!";
    $tagline = "PROJECT IOT - WATER TANK MONITORING";
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="image\logo2.png" class="logo" alt="Logo">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="part.php">Part</a></li>
                    <li><a href="dasboard.php">Project</a></li>
                </ul>
            </div>

            <div class="content">
                 <h1><?php echo $tagline; ?></h1>
                 <p><?php echo $welcomeMessage; ?></p>
                 <div>
                    <a href="anggota.php">
                        <button type="button"><span></span>ANGGOTA</button>
                    </a>
                    <a href="deskripsi.php">
                        <button type="button"><span></span>DESKRIPSI</button>
                    </a>
                 </div>
            </div>
        </div>
    </body>
</html>
