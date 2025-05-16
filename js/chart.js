document.addEventListener('DOMContentLoaded', function () {
  fetch('ambil-data.php')
    .then(response => response.json())
    .then(data => {
      const ctx = document.getElementById('suhuChart').getContext('2d');

      new Chart(ctx, {
        type: 'line',
        data: {
          labels: data.tanggal,
          datasets: [
            {
              label: 'Suhu (°C)',
              data: data.suhu,
              borderColor: '#4e73df',
              backgroundColor: 'rgba(78, 115, 223, 0.05)',
              fill: true,
              tension: 0.4,
              pointRadius: 3,
              pointBackgroundColor: '#4e73df'
            },
            {
              label: 'Heart Rate (bpm)',
              data: data.heart_rate,
              borderColor: '#e74a3b',
              backgroundColor: 'rgba(231, 74, 59, 0.05)',
              fill: true,
              tension: 0.4,
              pointRadius: 3,
              pointBackgroundColor: '#e74a3b'
            },
            {
              label: 'Oksigen (%)',
              data: data.oksigen,
              borderColor: '#1cc88a',
              backgroundColor: 'rgba(28, 200, 138, 0.05)',
              fill: true,
              tension: 0.4,
              pointRadius: 3,
              pointBackgroundColor: '#1cc88a'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              title: {
                display: true,
                text: 'Nilai Sensor'
              },
              grid: {
                color: '#f0f0f0'
              }
            },
            x: {
              title: {
                display: true,
                text: 'Tanggal'
              },
              grid: {
                display: false
              }
            }
          },
          plugins: {
            legend: {
              display: true,
              position: 'top'
            },
            tooltip: {
              backgroundColor: '#4e73df',
              titleColor: '#fff',
              bodyColor: '#fff'
            }
          }
        }
      });
    })
    .catch(error => console.error('Gagal memuat data:', error));
});
