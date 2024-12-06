<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part - Water Level Monitoring</title>
    <link rel="stylesheet" href="part.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <div class="banner">
        <div class="navbar">
            <img src="image/logo2.png" class="logo" alt="Logo">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="part.php" class="active">PART</a></li>
            </ul>
        </div>
    </div>

    <!-- Information Section -->
    <section class="information-section">
        <div class="components">
        <?php
        $components = [
            ["src" => "image/ESP32.png", "alt" => "ESP32", "info" => "ESP32 adalah mikrokontroler dengan WiFi dan Bluetooth bawaan."],
            ["src" => "image/Turbidity.png", "alt" => "Sensor Turbidity", "info" => "Sensor untuk mengukur tingkat kekeruhan air."],
            ["src" => "image/Kabel.png", "alt" => "Kabel Jumper", "info" => "Kabel yang digunakan untuk menghubungkan berbagai komponen."],
            ["src" => "image/Relay.png", "alt" => "Relay", "info" => "Relay adalah saklar yang dioperasikan secara elektrik."],
            ["src" => "image/lcd.png", "alt" => "LCD I2C", "info" => "Layar LCD untuk menampilkan data menggunakan antarmuka I2C."],
            ["src" => "image/selang.png", "alt" => "Selang", "info" => "Digunakan untuk pengelolaan aliran air."],
            ["src" => "image/laptop.png", "alt" => "Laptop", "info" => "Laptop untuk pemrograman dan pemantauan perangkat."],
            ["src" => "image/akrilik.png", "alt" => "Akrilik", "info" => "Akrilik ini digunakan untuk menyimpan komponen-komponen tersebut agar tersusun rapi."],
            ["src" => "image/3m.png", "alt" => "3M", "info" => "3M ini berfungsi untuk menempelkan komponen-komponen ke akrilik."],
            ["src" => "image/air.png", "alt" => "Air", "info" => "Air digunakan sebagai media utama untuk mengukur level ketinggian pada proyek Water Level Monitoring."]
        ];

        foreach ($components as $component) {
            echo '<div class="component">';
            echo '<img src="' . htmlspecialchars($component['src']) . '" alt="' . htmlspecialchars($component['alt']) . '">';
            echo '<h3>' . htmlspecialchars($component['alt']) . '</h3>';
            echo '<p>' . htmlspecialchars($component['info']) . '</p>';
            echo '</div>';
        }
        ?>
        </div>
    </section>

</body>
</html>
