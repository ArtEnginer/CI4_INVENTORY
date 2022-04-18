<!--
=========================================================
* Soft UI Dashboard - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url() ?>/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- DatePicker -->
    <script src="<?= base_url() ?>/assets/plugins/datepicker/js/jquery-1.10.2.js"></script>
    <link href="<?= base_url() ?>/assets/plugins/datepicker/css/bootstrap-datepicker.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>/assets/plugins/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!-- JQueryUI -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.css">

    <script>
        function isNumberKeyTrue(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (((charCode < 58) && (charCode > 47)) || (charCode == 8))
                return true;
            return false;
        }

        function isNumberKeyTrueWithSpace(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (((charCode < 58) && (charCode > 47)) || (charCode == 8) || (charCode == 32))
                return true;
            return false;
        }

        $(function() {
            $.datepicker.setDefaults({
                monthNamesShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt",
                    "Nov", "Des"
                ],
                dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                // showButtonPanel: true,
                // currentText: "Hari Ini",
                // closeText: "Close",
                nextText: "Berikutnya",
                prevText: "Sebelum",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: "yy-mm-dd",
                yearRange: "-100:+100",
                changeYear: true,
            });
            $("#tgl1").datepicker();
        });
    </script>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <!-- Navbar -->
    <?= $this->include('admin/layout/asaid'); ?>
    <!-- /.navbar -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div >
            <?= $this->include('admin/layout/navbar'); ?>
        </div>
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="conatainer-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <?php if (session()->getflashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getflashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getflashdata('failed')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getflashdata('failed'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container-fluid py-4">
                <!-- content -->
                <?= $this->renderSection('content'); ?>
                <!-- content -->
            </div>
        </div>

    </main>
    <div class="fixed-plugin">
        <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a> -->
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Theme</h5>
                    <p>Atur dashbormu!</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url() ?>/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- DatePicker -->
    <script src="<?= base_url() ?>/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>
    <!-- JQueryUI -->
    <script src="<?= base_url() ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>

    <script>
        $(function() {
            $('#dataTable1').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>