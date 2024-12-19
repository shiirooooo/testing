<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part - Water Level Monitoring</title>
    <link rel="stylesheet" href="css/part.css">
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
        ["src" => "image/ultrasonik.png", "alt" => "Sensor Ultrasonik", "info" => "Alat elektronika yang mengubah energi listrik menjadi energi mekanik dalam bentuk gelombang suara ultrasonik."],
        ["src" => "image/lcd.png", "alt" => "LCD I2C", "info" => "Layar LCD untuk menampilkan data menggunakan antarmuka I2C."],
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
