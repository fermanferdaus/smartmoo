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
    return data.oksigen + " %";
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

// Untuk grafik atau tabel
function updateTabelData(dari, sampai) {
  const url = `ambil-tabel.php?dari=${dari}&sampai=${sampai}`;
  fetch(url)
    .then(res => res.json())
    .then(data => {
      const tbody = document.getElementById('tabel-data');
      tbody.innerHTML = '';

      if (!Array.isArray(data) || data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4">Tidak ada data pada rentang tersebut.</td></tr>';
        return;
      }

      data.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${row.tanggal}</td>
          <td>${row.suhu}</td>
          <td>${row.heart_rate}</td>
          <td>${row.oksigen}</td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(err => {
      console.error('Gagal mengambil data tabel:', err);
      document.getElementById('tabel-data').innerHTML = '<tr><td colspan="4">Gagal memuat data</td></tr>';
    });
}

// Event listener tombol sync
document.addEventListener('DOMContentLoaded', function () {
  const btn = document.getElementById('syncButton');
  const dari = document.getElementById('dari');
  const sampai = document.getElementById('sampai');

  btn.addEventListener('click', () => {
    if (!dari.value || !sampai.value) {
      alert("Harap isi rentang tanggal.");
      return;
    }

    updateTabelData(dari.value, sampai.value);
  });
});

let currentPage = 1;
let totalData = 0;
let perPage = 10;
let allTabelData = [];

document.getElementById('perPage').addEventListener('change', function () {
  perPage = parseInt(this.value);
  currentPage = 1;
  renderTable();
});

document.getElementById('prevPage').addEventListener('click', function () {
  if (currentPage > 1) {
    currentPage--;
    renderTable();
  }
});

document.getElementById('nextPage').addEventListener('click', function () {
  const totalPages = Math.ceil(totalData / perPage);
  if (currentPage < totalPages) {
    currentPage++;
    renderTable();
  }
});

function updateTabelData(dari, sampai) {
  fetch(`ambil-tabel.php?dari=${dari}&sampai=${sampai}`)
    .then(res => res.json())
    .then(data => {
      allTabelData = data;
      totalData = data.length;
      currentPage = 1;
      renderTable();
    })
    .catch(err => {
      console.error('Gagal mengambil data tabel:', err);
      document.getElementById('tabel-data').innerHTML = '<tr><td colspan="4">Gagal memuat data</td></tr>';
    });
}

function renderTable() {
  const tbody = document.getElementById('tabel-data');
  tbody.innerHTML = '';

  if (!allTabelData || allTabelData.length === 0) {
    tbody.innerHTML = '<tr><td colspan="4">Tidak ada data pada rentang tersebut.</td></tr>';
    return;
  }

  const startIndex = (currentPage - 1) * perPage;
  const endIndex = Math.min(startIndex + perPage, allTabelData.length);
  const pageData = allTabelData.slice(startIndex, endIndex);

  pageData.forEach(row => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${row.tanggal}</td>
      <td>${row.suhu}</td>
      <td>${row.heart_rate}</td>
      <td>${row.oksigen}</td>
    `;
    tbody.appendChild(tr);
  });

  // Update info halaman
  const info = `Menampilkan ${startIndex + 1}–${endIndex} dari ${totalData} data`;
  document.getElementById('paginationInfo').textContent = info;
}
