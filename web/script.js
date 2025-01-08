// URL API untuk mengambil data
const apiUrl = "https://watertankmonitoring.my.id/WaterMonitoring/get_sensor_data.php";

// Elemen UI untuk data dan status
const currentHeightElement = document.getElementById('currentHeight');
const currentTurbidityElement = document.getElementById('currentTurbidity');
const maxHeightElement = document.getElementById('maxHeight');
const minHeightElement = document.getElementById('minHeight');
const avgHeightElement = document.getElementById('avgHeight');
const maxTurbidityElement = document.getElementById('maxTurbidity');
const minTurbidityElement = document.getElementById('minTurbidity');
const avgTurbidityElement = document.getElementById('avgTurbidity');
const waterLevelStatusElement = document.getElementById('waterLevelStatus');
const waterTurbidityStatusElement = document.getElementById('waterTurbidityStatus');
const mqttStatusElement = document.getElementById('mqttStatus');

// WebSocket client menggunakan MQTT.js
const brokerUrl = "ws://broker.hivemq.com:8000/mqtt";
let client = mqtt.connect(brokerUrl);

// Data untuk grafik
let waterHeightData = [];
let waterTurbidityData = [];
let timeLabels = [];
const maxDataPoints = 20; // Batasi hanya 20 data yang ditampilkan

// Menyiapkan grafik untuk Water Height menggunakan Chart.js
const ctxHeight = document.getElementById('waterHeightChart').getContext('2d');
const waterHeightChart = new Chart(ctxHeight, {
    type: 'line',
    data: {
        labels: timeLabels,
        datasets: [{
            label: 'Water Height (cm)',
            data: waterHeightData,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: false,
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: { title: { display: true, text: 'Time' } },
            y: { title: { display: true, text: 'Water Height (cm)' } }
        }
    }
});

// Menyiapkan grafik untuk Water Turbidity menggunakan Chart.js
const ctxTurbidity = document.getElementById('waterTurbidityChart').getContext('2d');
const waterTurbidityChart = new Chart(ctxTurbidity, {
    type: 'line',
    data: {
        labels: timeLabels,
        datasets: [{
            label: 'Water Turbidity (NTU)',
            data: waterTurbidityData,
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false,
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: { title: { display: true, text: 'Time' } },
            y: { title: { display: true, text: 'Turbidity (NTU)' } }
        }
    }
});

// Fungsi untuk mengambil data dari API
function fetchDataFromApi() {
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // Parse JSON from API
        })
        .then(data => {
            // Log data untuk pemeriksaan
            console.log("Data API: ", data);

            // Pastikan struktur data API benar
            if (data && data.produk_iot) {
                const produkIot = data.produk_iot;

                // Update Max, Min, Avg Water Height
                maxHeightElement.textContent = produkIot.water_level_max + " cm";
                minHeightElement.textContent = produkIot.water_level_min + " cm";
                avgHeightElement.textContent = produkIot.water_level_avg + " cm";

                // Convert values to number and check for valid numbers
                const maxTurbidity = parseFloat(produkIot.water_turbidity_max);
                const minTurbidity = parseFloat(produkIot.water_turbidity_min);
                const avgTurbidity = parseFloat(produkIot.water_turbidity_avg);

                // Cek apakah nilai valid atau tidak
                if (!isNaN(maxTurbidity)) {
                    maxTurbidityElement.textContent = maxTurbidity + " NTU";
                } else {
                    maxTurbidityElement.textContent = "Data tidak tersedia";
                }

                if (!isNaN(minTurbidity)) {
                    minTurbidityElement.textContent = minTurbidity + " NTU";
                } else {
                    minTurbidityElement.textContent = "Data tidak tersedia";
                }

                if (!isNaN(avgTurbidity)) {
                    avgTurbidityElement.textContent = avgTurbidity.toFixed(2) + " NTU";
                } else {
                    avgTurbidityElement.textContent = "Data tidak tersedia";
                }

                console.log("Data API berhasil diperbarui");
            } else {
                console.error("Struktur data API tidak sesuai");
            }
        })
        .catch(error => {
            console.error("Error fetching data from API: ", error);
        });
}

// MQTT Events
client.on('connect', function () {
    console.log("Connected to broker");

    // Update status koneksi MQTT
    mqttStatusElement.textContent = "Connected";
    mqttStatusElement.style.color = "green";
    client.subscribe('water/level');
    client.subscribe('water/turbidity');
    client.subscribe('water/level/status');
    client.subscribe('water/turbidity/status');
});

client.on('message', function (topic, message) {
    const payload = message.toString();
    const currentTime = new Date().toLocaleTimeString();

    if (topic === 'water/level') {
        currentHeightElement.textContent = payload + " cm";
        waterHeightData.push(parseFloat(payload));
        if (waterHeightData.length > maxDataPoints) {
            waterHeightData.shift();
            timeLabels.shift();
        }
        timeLabels.push(currentTime);
    } else if (topic === 'water/turbidity') {
        currentTurbidityElement.textContent = payload + " NTU";
        waterTurbidityData.push(parseFloat(payload));
        if (waterTurbidityData.length > maxDataPoints) {
            waterTurbidityData.shift();
        }
    } else if (topic === 'water/level/status') {
        waterLevelStatusElement.textContent = payload;
    } else if (topic === 'water/turbidity/status') {
        waterTurbidityStatusElement.textContent = payload;
    }

    waterHeightChart.update();
    waterTurbidityChart.update();
});

client.on('error', function (err) {
    console.error("MQTT Error: ", err);
    mqttStatusElement.textContent = "Disconnected";
    mqttStatusElement.style.color = "red";
});

client.on('close', function () {
    console.log("Disconnected from broker");
    mqttStatusElement.textContent = "Disconnected";
    mqttStatusElement.style.color = "red";
});

// Panggil fungsi fetchDataFromApi() saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    fetchDataFromApi();
    setInterval(fetchDataFromApi, 60000); // Update setiap 1 menit
});

document.addEventListener("DOMContentLoaded", () => {
    // Move Back to Dashboard Button to Top Right
    const container = document.querySelector(".container");
    const backButton = document.querySelector(".btn.btn-dark");

    // Create a wrapper for buttons in the top-right corner
    const topRightButtons = document.createElement("div");
    topRightButtons.style.position = "absolute";
    topRightButtons.style.top = "10px";
    topRightButtons.style.right = "10px";
    topRightButtons.style.display = "flex";
    topRightButtons.style.gap = "10px";

    // Style and reposition the back button
    backButton.style.position = "relative";
    backButton.style.zIndex = "1";

    // Create a new Refresh Button
    const refreshButton = document.createElement("button");
    refreshButton.className = "btn btn-success";
    refreshButton.textContent = "Refresh";
    refreshButton.onclick = () => {
        location.reload(); // Reload the page when the button is clicked
    };

    // Append buttons to the wrapper
    topRightButtons.appendChild(backButton);
    topRightButtons.appendChild(refreshButton);

    // Insert the wrapper into the container
    container.style.position = "relative";
    container.appendChild(topRightButtons);
});

// Tambahkan elemen tabel di bawah grafik turbidity pada HTML
const chartContainer = document.querySelector('.chart-container');

// Buat container untuk tabel
const tableContainer = document.createElement('div');
tableContainer.classList.add('table-container');
tableContainer.style.marginTop = "20px";
tableContainer.style.overflowX = "auto";
tableContainer.style.background = "rgba(255, 255, 255, 0.1)";
tableContainer.style.padding = "15px";
tableContainer.style.borderRadius = "15px";
tableContainer.style.backdropFilter = "blur(5px)";

// Tambahkan tabel ke dalam container
const table = document.createElement('table');
table.style.width = "100%";
table.style.borderCollapse = "collapse";
table.style.color = "white";
table.style.textAlign = "center";
table.innerHTML = `
    <thead>
        <tr>
            <th style="border-bottom: 2px solid white; padding: 10px;">Time</th>
            <th style="border-bottom: 2px solid white; padding: 10px;">Water Height (cm)</th>
            <th style="border-bottom: 2px solid white; padding: 10px;">Water Turbidity (NTU)</th>
        </tr>
    </thead>
    <tbody id="data-table-body"></tbody>
`;
tableContainer.appendChild(table);
chartContainer.parentElement.appendChild(tableContainer);

// Fungsi untuk mengambil data dari API dan memperbarui tabel
function updateTable() {
    const tableBody = document.getElementById('data-table-body');
    tableBody.innerHTML = ""; // Kosongkan tabel sebelum menambahkan data baru

    // Mengambil data dari API
    fetch("https://watertankmonitoring.my.id/WaterMonitoring/get_recent_data.php?limit=10")
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); // Parse JSON dari API
        })
        .then(data => {
            // Pastikan data valid
            if (Array.isArray(data) && data.length > 0) {
                data.forEach(item => {
                    // Membuat baris baru untuk setiap data
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td style="padding: 10px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">${item.ts}</td>
                        <td style="padding: 10px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">${item.waterLevel} cm</td>
                        <td style="padding: 10px; border-bottom: 1px solid rgba(255, 255, 255, 0.2);">${item.turbidityNtu} NTU</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                console.error("Data API tidak valid atau kosong.");
            }
        })
        .catch(error => {
            console.error("Error fetching data from API: ", error);
        });
}

// Panggil updateTable saat halaman dimuat untuk pertama kali
document.addEventListener('DOMContentLoaded', updateTable);

// Menambahkan tombol Download PDF dengan ikon di sebelah tulisan
const downloadPdfButton = document.createElement("button");
downloadPdfButton.textContent = " Download Data as PDF";

// Menambahkan ikon di sebelah tulisan menggunakan Font Awesome
const pdfIcon = document.createElement("i");
pdfIcon.classList.add("fas", "fa-file-pdf");  // Menambahkan kelas Font Awesome untuk ikon PDF
pdfIcon.style.marginRight = "8px";  // Memberikan jarak antara ikon dan tulisan

downloadPdfButton.classList.add("btn", "btn-primary");
downloadPdfButton.style.marginTop = "20px"; // Menambahkan margin atas

// Menambahkan ikon dan teks ke dalam tombol
downloadPdfButton.prepend(pdfIcon);

// Menambahkan tombol setelah tabel
tableContainer.appendChild(downloadPdfButton);
;

// Event listener untuk tombol download PDF
downloadPdfButton.addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Ambil tabel yang ada di halaman
    const table = document.querySelector("table");

    // Mengonversi tabel menjadi PDF
    doc.autoTable({ html: table });

    // Menyimpan PDF dengan nama 'water_tank_data.pdf'
    doc.save("water_tank_data.pdf");
});