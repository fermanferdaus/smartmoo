<?php
include 'akses-ditolak.php'; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SmartMoo | Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <!-- Header as Card -->
        <div class="container-fluid px-4 mt-4">
            <div class="card border-0 shadow p-4 rounded-4 bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Kiri: Judul -->
                    <div class="text-start">
                        <h1 class="display-5 fw-bold mb-2">SmartMoo</h1>
                    </div>

                    <!-- Kanan: Profil Admin -->
                    <div class="dropdown text-end">
                        <button class="btn btn-info text-white d-flex align-items-center dropdown-toggle" type="button" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/profile.svg" alt="Admin" class="rounded-circle me-2" width="32" height="32" />
                            <span class="fw-semibold">Hi, Admin</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features section-->
        <section class="py-3" id="features">
            <div class="container-fluid px-4 my-4">

                <!-- Baris Pertama -->
                <div class="row g-4 mb-2">
                    <!-- Suhu -->
                    <div class="col-md-4 col-sm-12 d-flex">
                        <div class="card border-0 shadow-sm p-3 rounded-4 w-100">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-thermometer-half fs-3"></i>
                                </div>
                                <div class="ms-4 pt-2 pb-2">
                                    <h6 class="text-muted mb-0">Suhu</h6>
                                    <h5 class="fw-semibold mb-0" id="suhu">---</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Heart Rate -->
                    <div class="col-md-4 col-sm-12 d-flex">
                        <div class="card border-0 shadow-sm p-3 rounded-4 w-100">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-heart-pulse fs-3"></i>
                                </div>
                                <div class="ms-4 pt-2 pb-2">
                                    <h6 class="text-muted mb-0">Heart Rate</h6>
                                    <h5 class="fw-semibold mb-0" id="heart">---</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Oksigen -->
                    <div class="col-md-4 col-sm-12 d-flex">
                        <div class="card border-0 shadow-sm p-3 rounded-4 w-100">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-droplet fs-3"></i>
                                </div>
                                <div class="ms-4 pt-2 pb-2">
                                    <h6 class="text-muted mb-0">Oksigen</h6>
                                    <h5 class="fw-semibold mb-0 text-dark" id="oksigen">---</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- Baris Kedua -->
                    <div class="row g-4">
                    <!-- Baterai -->
                    <div class="col-md-4 col-sm-12 d-flex">
                        <div class="card border-0 shadow-sm p-3 rounded-4 w-100">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-battery-half fs-3"></i>
                                </div>
                                <div class="ms-4 pt-2 pb-2">
                                    <h6 class="text-muted mb-0">Baterai</h6>
                                    <h5 class="fw-semibold mb-0 text-dark" id="baterai">---</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Koneksi -->
                    <div class="col-md-4 col-sm-12 d-flex">
                        <div class="card border-0 shadow-sm p-3 rounded-4 w-100">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-4 d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-wifi fs-3"></i>
                                </div>
                                <div class="ms-4 pt-2 pb-2">
                                    <h6 class="text-muted mb-0">Koneksi</h6>
                                    <h5 class="fw-semibold mb-0 text-dark" id="koneksi">---</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <div class="container-fluid px-4 mb-3">
            <div class="row g-3 align-items-end flex-wrap">
                <div class="col-12 col-md-auto">
                    <label for="dari" class="form-label mb-1">Dari</label>
                    <input type="date" id="dari" class="form-control">
                </div>
                <div class="col-12 col-md-auto">
                    <label for="sampai" class="form-label mb-1">Sampai</label>
                    <input type="date" id="sampai" class="form-control">
                </div>
                <div class="col-12 col-md-auto">
                <button id="syncButton" class="btn btn-info text-nowrap px-4" >
                    <i id="syncIcon" class="bi bi-arrow-clockwise me-1"></i>
                </button>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                <div class="chart-area" style="height: 300px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-dark mb-0">
                            Grafik Kesehatan Sapi 
                        </h6>
                    </div>
                    <canvas id="suhuChart"></canvas>
                </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h6 class="fw-bold text-dark mb-3">Riwayat Data Kesehatan</h6>

                    <!-- Pilihan jumlah data -->
                    <div class="mb-3 d-flex flex-wrap align-items-center gap-2">
                        <label for="perPage" class="form-label mb-0">Tampilkan</label>
                        <select id="perPage" class="form-select w-auto">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <span>data per halaman</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Suhu (°C)</th>
                                    <th>Heart Rate (bpm)</th>
                                    <th>Oksigen (%)</th>
                                </tr>
                            </thead>
                        <tbody id="tabel-data">
                            <tr><td colspan="4">Klik Sync untuk melihat data...</td></tr>
                        </tbody>
                        </table>
                    </div>

                    <!-- Navigasi halaman -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <button class="btn btn-outline-secondary btn-sm" id="prevPage">← Sebelumnya</button>
                        <span id="paginationInfo" class="small text-muted"></span>
                        <button class="btn btn-outline-secondary btn-sm" id="nextPage">Berikutnya →</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-2 bg-white">
            <div class="container px-5"><p class="m-0 text-center text-dark fw-bold">Copyright &copy; 2025 by SmartMoo. All rights reserved.</p></div>
        </footer>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin akan keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Logout" jika anda akan meninggalkan sesi ini.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/chart.js"></script>

        <!-- Core theme JS-->
        <script src="js/ajax-update.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
