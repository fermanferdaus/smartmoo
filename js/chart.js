let chart;

document.addEventListener('DOMContentLoaded', function () {
  const ctx = document.getElementById('suhuChart').getContext('2d');
  const dari = document.getElementById('dari');
  const sampai = document.getElementById('sampai');
  const syncButton = document.getElementById('syncButton');
  const syncIcon = document.getElementById('syncIcon'); // pastikan <i> ini ada di tombol

  // Grafik kosong dengan grid
  const emptyChartData = {
    labels: [],
    datasets: [
      {
        label: 'Suhu (°C)',
        data: [],
        borderColor: '#4e73df',
        backgroundColor: 'rgba(78, 115, 223, 0.05)',
        fill: true,
        tension: 0.4,
        pointRadius: 0
      },
      {
        label: 'Heart Rate (bpm)',
        data: [],
        borderColor: '#e74a3b',
        backgroundColor: 'rgba(231, 74, 59, 0.05)',
        fill: true,
        tension: 0.4,
        pointRadius: 0
      },
      {
        label: 'Oksigen (%)',
        data: [],
        borderColor: '#1cc88a',
        backgroundColor: 'rgba(28, 200, 138, 0.05)',
        fill: true,
        tension: 0.4,
        pointRadius: 0
      }
    ]
  };

  // Inisialisasi grafik
  chart = new Chart(ctx, {
    type: 'line',
    data: emptyChartData,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true,
          suggestedMax: 150 
        },
        x: {
          ticks: { color: '#6c757d' },
          grid: { display: false, drawBorder: false }
        }
      },
      plugins: {
        legend: { display: true, position: 'top' },
        tooltip: {
          backgroundColor: '#4e73df',
          titleColor: '#fff',
          bodyColor: '#fff'
        }
      }
    }
  });

  function loadData(dariVal, sampaiVal) {
    const url = `ambil-grafik.php?dari=${dariVal}&sampai=${sampaiVal}`;

    // Mulai animasi spin pada ikon sync
    syncIcon.classList.add('spin');

    fetch(url)
      .then(res => res.json())
      .then(data => {
        chart.data.labels = data.tanggal;
        chart.data.datasets[0].data = data.suhu;
        chart.data.datasets[1].data = data.heart_rate;
        chart.data.datasets[2].data = data.oksigen;
        chart.update();

        // Hentikan animasi setelah update
        syncIcon.classList.remove('spin');
      })
      .catch(err => {
        console.error('Gagal memuat data:', err);
        syncIcon.classList.remove('spin');
      });
  }

  // Event klik tombol sync
  syncButton.addEventListener('click', function () {
    if (dari.value && sampai.value) {
      loadData(dari.value, sampai.value);
    } else {
      alert("Harap isi tanggal Dari dan Sampai");
    }
  });
});
