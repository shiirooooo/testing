<?php
    $title = "SOUTHSIDE";
    $menuItems = [
        "Home" => "index.php",
        "Part" => "part.php",
        "Project" => "dasboard.php",
    ];
    $members = ["Dylan", "Taofik", "Geo", "Hafiz", "Hasan", "Azzam"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap');
        </style>
    </head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="image/logo2.png" class="logo" alt="Logo">
                <ul>
                    <?php foreach ($menuItems as $menuName => $menuLink): ?>
                        <li><a href="<?php echo $menuLink; ?>"><?php echo $menuName; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="content">
                <h1>Our Team</h1>
                <div class="members">
                    <?php foreach ($members as $member): ?>
                        <div class="member-card">
                            <div class="card-image"></div>
                            <h2><?php echo $member; ?></h2>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </body>
</html>
