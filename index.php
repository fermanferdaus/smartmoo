<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <!-- Bootstrap icons-->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <!-- Header as Card -->
        <div class="container-fluid px-4 mt-4">
            <div class="card border-0 shadow p-4 text-center rounded-4 bg-info text-white">
                <h1 class="display-5 fw-bold mb-2">SmartMoo</h1>
                <p class="lead mb-0">Smart IoT Monitoring System for Livestock</p>
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
                                <h4 class="fw-bold mb-0" id="suhu">--- °C</h4>
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
                                <h4 class="fw-bold mb-0" id="heart">---</h4>
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
                                <h5 class="fw-semibold mb-0 text-dark" id="oksigen">--- bpm</h5>
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
                                <h5 class="fw-semibold mb-0 text-dark" id="baterai">--- %</h5>
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
                                <h5 class="fw-semibold mb-0 text-dark" id="status-koneksi">--- %</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </section>

        <div class="container-fluid px-4">
            <div class="card shadow-sm border-0">
                <div class="card-header fw-bold">Grafik</div>
                <div class="card-body">
                    <div class="chart-area" style="height: 300px;">
                        <canvas id="suhuChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-3 bg-info">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; 2025 by SmartMoo. All rights reserved.</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="js/chart.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/ajax-update.js"></script>
        <script src="js/update-jadwal.js"></script>
        <script src="js/update-suhu.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
