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

<?php
$db = \Config\Database::connect();
$builder = $db->table('web');
$query = $builder->get();
$data = $query->getRowArray();

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="">
  <title>
    Sign-In
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
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= base_url() ?>/pages/dashboard.html">

              <?= $data['nm_web'] ?>

            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="<?= base_url() ?>/dashboard">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?= base_url() ?>/profile">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>

               
              </ul>
              <li class="nav-item d-flex align-items-center">
                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank" href="<?= base_url() ?>/Homepage">Cek Ketersediaan Barang</a>
              </li>
              <!-- <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Free download</a>
                </li>
              </ul> -->
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content ">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p> <br>
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
                <div class="card-body">
                  <form action="<?= base_url('login') ?>" method="post">
                    <?= csrf_field(); ?>
                    <label>Username</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="username-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <div class="row g-1">
                        <div class="col-11">
                          <input type="password" class="form-control i-pass" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        </div>

                        <div class="col-1 text-center ">
                          <a class="btn bg-gradient-info btn-eye">
                            <span class="eyeshow">
                            </span>
                          </a>
                        </div>


                        <!-- button with icon eye for look password -->
                      </div>

                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      
                      <label class="form-check-label" for="rememberMe">Simpan Login</label> 
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>

                <br><br>

              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url() ?>/assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">

      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> <?= $data['nm_web'] ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // if btn eye is clicked then show password

    var btneye = document.getElementsByClassName('btn-eye')[0];
    var inputpass = document.getElementsByClassName('i-pass')[0];
    var eye = document.getElementsByClassName('eyeshow')[0];
    var input = document.getElementsByClassName('form-control')[0];
    var slasheye = '<i class="fas fa-eye-slash"></i>';
    var noslasheye = '<i class="fas fa-eye"></i>';

    // if inputpass is clicked then show password
    inputpass.addEventListener('click', function() {
      if (inputpass.type == 'password') {
        inputpass.type = 'text';
        eye.innerHTML = slasheye;
      } else {
        inputpass.type = 'password';
        eye.innerHTML = noslasheye;
      }
    });


    btneye.addEventListener('click', function() {
      if (inputpass.type === 'password') {
        inputpass.type = 'text';
        eye.innerHTML = slasheye;
      } else {
        inputpass.type = 'password';
        eye.innerHTML = noslasheye;

      }
    });


    var checkbox = document.getElementById('rememberMe');
    // if checkbox is chacked then save username and password to local storage
    checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
        localStorage.setItem('username', input.value);
        localStorage.setItem('password', inputpass.value);
      } else {
        localStorage.removeItem('username');
        localStorage.removeItem('password');
      }
    });

    // if in local storage username and password is set then set input value to local storage
    if (localStorage.getItem('username') && localStorage.getItem('password')) {
      input.value = localStorage.getItem('username');
      inputpass.value = localStorage.getItem('password');
      checkbox.checked = true;
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
</body>

</html>