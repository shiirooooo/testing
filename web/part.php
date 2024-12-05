<?php
    $title = "PART";
    $name = "Dylan Radhitya";
    $profession = "FULLSTACK DEVELOPER";
    $description = "Front end developer from Bandung, Indonesia. I create website to help businesses do better online.";
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
                <img src="logo2.png" class="logo" alt="Logo">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portofolio.php">Portofolio</a></li>
                    <li><a href="project.php">Project</a></li>
                    <li><a href="music.php">Music</a></li>
                </ul>
            </div>

            <div class="info">
                <h3>Hi, I'm <?php echo $name; ?>.</h3>
                <h1><?php echo $profession; ?></h1>
                <h3><?php echo $description; ?></h3>
                <a href="#">Hire Me</a>
            </div>

            <div class="image1">
                <img src="dylan.PNG" class="dylan" alt="<?php echo $name; ?>">
            </div>
        </div>
    </body>
</html>
