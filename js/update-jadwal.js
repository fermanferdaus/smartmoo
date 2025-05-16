// Fungsi untuk mengirimkan data jadwal pakan
function submitJadwalPakan() {
    // Ambil nilai input dari form
    const jadwal1 = document.getElementById("jadwal1").value;
    const jadwal2 = document.getElementById("jadwal2").value;
    const jadwal3 = document.getElementById("jadwal3").value;

    if (!jadwal1 || !jadwal2 || !jadwal3) {
        Swal.fire({
            icon: "warning",
            title: "Form Tidak Lengkap!",
            text: "Harap isi semua jadwal sebelum melanjutkan.",
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary",
            },
            buttonsStyling: false,
        });
        return; // Stop eksekusi fungsi jika ada form yang kosong
    }

    // Panggil fungsi updateJadwalPakan untuk mengirim data ke server
    updateJadwalPakan(jadwal1, jadwal2, jadwal3);
}

// Fungsi untuk memperbarui jadwal pakan
function updateJadwalPakan(jadwal1, jadwal2, jadwal3) {
    var xhr = new XMLHttpRequest();

    // Mengirimkan data ke server dengan metode POST
    xhr.open('POST', 'update-jadwal-pakan.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                Swal.fire({
                    icon: "success",
                    title: "Jadwal Pakan Diperbarui!",
                    text: "Jadwal pakan telah berhasil diatur.",
                    confirmButtonText: "OK",
                    timer: 3000,
                    timerProgressBar: true,
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Gagal Memperbarui Jadwal!",
                    text: response.error || "Terjadi kesalahan saat memperbarui jadwal pakan.",
                    footer: "Silakan coba lagi nanti.",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    },
                    buttonsStyling: false,
                });
            }
        } else {
            Swal.fire({
                icon: "error",
                title: "Gagal Memperbarui Jadwal!",
                text: "Terjadi kesalahan pada server.",
                footer: "Silakan coba lagi nanti.",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
                buttonsStyling: false,
            });
        }
    };

    xhr.onerror = function () {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Terjadi kesalahan jaringan!",
            footer: "Periksa koneksi internet Anda dan coba lagi.",
            customClass: {
                confirmButton: "btn btn-primary",
            },
            buttonsStyling: false,
        });
    };

    // Kirimkan data ke server
    xhr.send(JSON.stringify({ jadwal1: jadwal1, jadwal2: jadwal2, jadwal3: jadwal3 }));
}
