function updateStatus(url, elementId, formatData) {
    var element = document.getElementById(elementId);
    element.classList.remove('loaded');

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(`Data dari ${url}:`, data); 
            element.innerHTML = formatData ? formatData(data) : data;
        })
        .finally(() => {
            element.classList.add('loaded');
        });
}

// Format fungsi untuk data suhu
function formatSuhu(data) {
    return data.suhu + " °C";
}

function formatHeart(data) {
    return data.heart_rate + " bpm";
}

function formatOksigen(data) {
    return data.oksigen + " bpm";
}

function formatBaterai(data) {
    return data.baterai + " %";
}

function formatKoneksi(data) {
    return data.status_koneksi + " %";
}

// Fungsi untuk memperbarui semua data
function updateAll() {
    updateStatus('ambil-data.php', 'heart', formatHeart);
    updateStatus('ambil-data.php', 'suhu', formatSuhu);
    updateStatus('ambil-data.php', 'oksigen', formatOksigen);
    updateStatus('ambil-data.php', 'koneksi', formatKoneksi);
    updateStatus('ambil-data.php', 'baterai', formatBaterai);
}

// Panggil fungsi secara berkala setiap 5 detik
setInterval(updateAll, 5000);

// Panggil updateAll untuk pertama kali
updateAll();
