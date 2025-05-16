// Fungsi submit suhu pakan
function submitSuhu() {
    const suhu1 = document.getElementById("suhu1").value;
    const suhu2 = document.getElementById("suhu2").value;

    if (!suhu1 || !suhu2) {
        Swal.fire({
            icon: "warning",
            title: "Form Tidak Lengkap!",
            text: "Harap isi suhu minimum dan maksimum sebelum melanjutkan.",
            confirmButtonText: "OK",
            customClass: {
                confirmButton: "btn btn-primary",
            },
            buttonsStyling: false,
        });
        return; // Stop eksekusi fungsi jika ada form yang kosong
    }

    updateSuhuPakan(suhu1, suhu2);
}

function updateSuhuPakan(suhu1, suhu2) {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'update-rentan-suhu.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            if (response.success) {
                Swal.fire({
                    icon: "success",
                    title: "Suhu Diperbarui!",
                    text: "Suhu telah berhasil diatur.",
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
                    title: "Gagal Memperbarui Suhu!",
                    text: response.error || "Terjadi kesalahan saat memperbarui suhu.",
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
                title: "Gagal Memperbarui Suhu!",
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

    xhr.send(JSON.stringify({ suhu1: suhu1, suhu2: suhu2 }));
}

