const express = require('express');
const axios = require('axios');
const cors = require('cors');

const app = express();
app.use(cors());

app.get('/proxy', async (req, res) => {
    try {
        const response = await axios.get('https://watertankmonitoring.my.id/WaterMonitoring/get_sensor_data.php');
        res.json(response.data);
    } catch (error) {
        res.status(500).send('Error fetching data from API');
    }
});

app.listen(3000, () => {
    console.log('Proxy server running on http://localhost:3000');
});
