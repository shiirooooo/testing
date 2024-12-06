<?php
    $title = "MUSIC";
    $headingLeft = "THE<br>REAL<br>SOUND";
    $instruction = "Click here to listen";
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="/image/logo2.png" class="logo" alt="Logo">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="part.php">Part</a></li>
                    <li><a href="dasboard.php">Project</a></li>
                    <li><a href="music.php">Music</a></li>
                </ul>
            </div>

            <div class="contentmusic">
                <div class="left-col">
                    <h1><?php echo $headingLeft; ?></h1>
                </div>
                <div class="right-col">
                    <p><?php echo $instruction; ?></p>
                    <img src="play.png" id="icon" alt="Play Icon">
                </div>
            </div>
        </div>

        <audio id="mySong">
            <source src="song2.mp3" type="audio/mp3">
        </audio>

        <script>
            var mySong = document.getElementById("mySong");
            var icon = document.getElementById("icon");
                
            icon.onclick = function() {
                if (mySong.paused) {
                    mySong.play();
                    icon.src = "pause.png";
                } else {
                    mySong.pause();
                    icon.src = "play.png";
                }    
            }
        </script>
    </body>
</html>
