// Fungsi generik untuk mengupdate elemen berdasarkan URL dan ID
function updateStatus(url, elementId, formatData) {
    var element = document.getElementById(elementId);
    // Tampilkan loading sementara
    element.classList.remove('loaded');

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(`Data dari ${url}:`, data); // Tambahkan log untuk debugging
            // Gunakan formatData jika disediakan
            element.innerHTML = formatData ? formatData(data) : data;
        })
        .finally(() => {
            element.classList.add('loaded');
        });
}


// Format fungsi untuk data berat
function formatBerat(data) {
    return data.berat + " g";
}

// Format fungsi untuk data suhu
function formatSuhu(data) {
    return data.suhu + " °C";
}

// Format fungsi untuk status pakan
function formatPakan(data) {
    let statusPakan = parseInt(data.status_pakan); // Konversi ke integer
    return statusPakan === 1 ? 'Aktif' : 'Nonaktif';
}

function formatKipas(data) {
    let statusKipas = parseInt(data.status_kipas); // Konversi ke integer
    return statusKipas === 1 ? 'Aktif' : 'Nonaktif';
}

function formatLampu(data) {
    let statusLampu = parseInt(data.status_lampu); // Konversi ke integer
    return statusLampu === 1 ? 'Aktif' : 'Nonaktif';
}

// Format fungsi untuk jadwal
function formatJadwal(data) {
    return {
        jadwal1: data.jadwal1 || 'Belum disetel',
        jadwal2: data.jadwal2 || 'Belum disetel',
        jadwal3: data.jadwal3 || 'Belum disetel'
    };
}

// Format fungsi untuk suhu rentan
function formatSuhuRentan(data) {
    return {
        suhu1: data.suhu1 || 'Belum disetel',
        suhu2: data.suhu2 || 'Belum disetel'
    };
}

// Fungsi untuk memperbarui semua data
function updateAll() {
    // Memperbarui berat
    updateStatus('ambil-berat.php', 'berat', formatBerat);

    // Memperbarui suhu
    updateStatus('ambil-suhu.php', 'suhu', formatSuhu);

    // Memperbarui status pakan
    updateStatus('ambil-pakan.php', 'status-pakan', formatPakan);

    // Memperbarui status kipas
    updateStatus('ambil-kipas.php', 'status-kipas', formatKipas);

    // Memperbarui status lampu
    updateStatus('ambil-lampu.php', 'status-lampu', formatLampu);

    // Memperbarui jadwal
    fetch('ambil-jadwal.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('jadwal1-sekarang').innerText = data.jadwal1 || 'Belum disetel';
            document.getElementById('jadwal2-sekarang').innerText = data.jadwal2 || 'Belum disetel';
            document.getElementById('jadwal3-sekarang').innerText = data.jadwal3 || 'Belum disetel';
        });

    // Memperbarui suhu rentan
    fetch('ambil-rentan-suhu.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('suhu1-sekarang').innerText = data.suhu1 || 'Belum disetel';
            document.getElementById('suhu2-sekarang').innerText = data.suhu2 || 'Belum disetel';
        });
}

// Panggil fungsi secara berkala setiap 5 detik
setInterval(updateAll, 5000);

// Panggil updateAll untuk pertama kali
updateAll();
