<?php
    $title = "SOUTHSIDE";
    $menuItems = [
        "Home" => "index.php",
        "Part" => "part.php",
        "Project" => "dasboard.php",
    ];
    $members = [
        ["name" => "Taofik Ramdani", "nim" => "152022094"],
        ["name" => "Hafiz Izzatur Rahman", "nim" => "152022115"],
        ["name" => "Geonama Huda Rahfa", "nim" => "152022121"],
        ["name" => "Dylan Radhitya", "nim" => "152022236"],
        ["name" => "Subaligh Hasan", "nim" => "152022103"],
        ["name" => "Hanif Abdul Azzam", "nim" => "152022092"]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/anggota.css">
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
            <h1>ANGGOTA</h1>
            <div class="members">
                <?php foreach ($members as $member): ?>
                    <div class="member-card">
                        <div class="card-image"><?php echo strtoupper(substr($member['name'], 0, 1)); ?></div>
                        <h2><?php echo $member['name']; ?></h2>
                        <p>NIM: <?php echo $member['nim']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>
