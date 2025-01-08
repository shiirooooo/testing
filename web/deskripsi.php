<?php
    $title = "SOUTHSIDE - Water Tank Monitoring System";
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
        <link rel="stylesheet" href="css/deskripsi.css">
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
                <h1>Water Tank Monitoring System</h1>
                <p>Water Tank Monitoring System adalah solusi pintar untuk memantau dan mengelola kualitas serta ketinggian air pada toren secara otomatis. Dengan menggunakan dua jenis sensor, yaitu sensor ultrasonik untuk mengukur ketinggian air dan sensor turbidity untuk memantau kualitas air, sistem ini memberikan data yang akurat dan real-time.</p>
                <p>Ketika level air terdeteksi rendah, sistem secara otomatis mengaktifkan pompa untuk mengisi air ke dalam toren hingga mencapai kapasitas yang diinginkan, menjaga ketersediaan air yang optimal. Semua data ini terhubung ke aplikasi mobile dan website yang memanfaatkan MQTT untuk transmisi data secara real-time, memastikan pemantauan yang terus menerus dan efisien.</p>
                <p>Sistem ini juga dilengkapi dengan API yang dihosting untuk menyajikan data analitik penting, seperti level air maksimum, minimum, dan rata-rata, serta tingkat kekeruhan air (turbidity). Dengan demikian, pengguna dapat memantau kondisi toren secara lebih komprehensif dan mengambil tindakan yang tepat berdasarkan data yang dihasilkan.</p>
                <p>Solusi ini ideal untuk pemantauan toren air pada berbagai skala, baik di rumah, gedung perkantoran, maupun fasilitas industri, yang membutuhkan sistem pemantauan air yang cerdas, otomatis, dan terintegrasi dengan teknologi IoT.</p>

                <!-- Add Image Poster below the description -->
                <img src="image/poster.png" alt="Water Tank Poster" class="poster-image">
            </div>
        </div>
    </body>
</html>
