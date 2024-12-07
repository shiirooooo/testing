<?php
    $title = "SOUTHSIDE";
    $menuItems = [
        "Home" => "index.php",
        "Part" => "part.php",
        "Project" => "dasboard.php",
    ];
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
            <div class="contscoial">
                <!-- Konten sosial bisa ditambahkan di sini -->
            </div>
        </div>
    </body>
</html>
