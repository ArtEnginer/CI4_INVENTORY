  <?php
  $db = \Config\Database::connect();
  $builder = $db->table('vhistory');
  // $query = $builder->orderBy('created_at', 'asc')->get();

  $query = $builder->orderBy('created_at', 'desc')->limit(7)->get();

  $history = $query->getResultArray();

  ?>

  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-bottom border-radius-xl bg-white" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $title ?></li>
        </ol>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

        </div>
        <ul class="navbar-nav  justify-content-end">

          <li class="nav-item d-flex align-items-center">
            <a href="<?= base_url('logout') ?>" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Log Out</span>
            </a>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>


          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">



              <?php
              foreach ($history as $data) : {


              ?>



                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">
                              <b> <i><?= $data['jumlah'] ?></i></b>
                              <?= $data['nm_barang'] ?>
                              <?php
                              //  if last char is = 'm' echo masuk else keluar
                              if (substr($data['id'], 0, 2) == 'BM') {
                                echo ' </span> <i class="text-success">Masuk</i> ';
                              } elseif (substr($data['id'], 0, 2) == 'BK') {
                                echo ' </span> <i class="text-danger">Keluar</i> ';
                              }


                              ?>

                              <!-- </span> <i class="text-success">Masuk</i>  -->
                          </h6>
                          <p class="text-xs text-secondary mb-0 ">
                            <i class="fa fa-clock me-1 text-primary"></i>
                            <?= $data['created_at'] ?>

                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
              <?php
                }
              endforeach;

              ?>



            </ul>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <span class="text-muted text-right ">
              <?php
              // check if session is set status is Aktif then icon Active
              if (isset($_SESSION['status']) && $_SESSION['status'] == 'Aktif') {
                echo ('<i class="fas fa-circle text-success"></i>');
              } else {
                echo ('<i class="fas fa-circle text-danger"></i>');
              }
              ?>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </nav>