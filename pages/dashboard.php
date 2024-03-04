  <?php
  $query_anggota = query("SELECT * FROM user WHERE role='anggota'");
  $query_petugas = query("SELECT * FROM user WHERE role='petugas'");
  $query_buku = query("SELECT * FROM buku");

  if ($level == 'anggota') {
    $id = $_SESSION['user']['userid'];

    $query_pinjam = query("SELECT * FROM peminjaman WHERE userid='$id'");
  } else {
    $query_pinjam = query("SELECT * FROM peminjaman WHERE status_peminjaman='selesai'");
  }

  $row_anggota = num_row1($query_anggota);
  $row_petugas = num_row1($query_petugas);
  $row_buku = num_row1($query_buku);
  $row_pinjam = num_row1($query_pinjam);



  ?>


  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">group</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah Anggota</p>
              <h4 class="mb-0"><?= $row_anggota ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah Petugas</p>
              <h4 class="mb-0"><?= $row_petugas ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">books</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Jumlah Buku</p>
              <h4 class="mb-0"><?= $row_buku ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">event</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Peminjaman Selesai</p>
              <h4 class="mb-0"><?= $row_pinjam ?></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">

    </div>
    <div class="row mb-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">

      </div>

    </div>
    <footer class="footer py-4  ">
    </footer>
  </div>