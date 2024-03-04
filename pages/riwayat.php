<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3" align="center">Riwayat Peminjaman <?= ($level == 'anggota') ? $_SESSION['user']['nama_lengkap'] : '' ?></h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <?php
          if ($level == 'admin' || $level == 'petugas') {
          ?>
            <div class="ms-3 mt-3 mb-3 ">
              <a href="laporan.php" class="btn btn-success">
                <i class="material-icons">print</i>

                Generate laporan
              </a>
            </div>
          <?php
          }
          ?>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="history">
              <thead class='text-center'>
                <tr>
                  <th>No</th>
                  <th>Peminjam</th>
                  <th>Buku</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody class='text-center'>
                <?php
                $no = 1;

                if ($level == 'anggota') {

                  $id = $_SESSION['user']['userid'];

                  $query = query("SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.bukuid=buku.bukuid INNER JOIN user ON peminjaman.userid=user.userid WHERE peminjaman.userid='$id' ORDER BY peminjamanid DESC");
                } else {
                  $query = query("SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.bukuid=buku.bukuid INNER JOIN user ON peminjaman.userid=user.userid ORDER BY peminjamanid DESC");
                }

                while ($data = array1($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['tanggal_peminjaman'] ?></td>
                    <td><?= ($data['tanggal_pengembalian'] == "0000-00-00") ? '-' : $data['tanggal_pengembalian'] ?></td>
                    <td><span class="badge badge-sm bg-<?= ($data['status_peminjaman'] == 'dipinjam') ? 'warning' : 'info' ?>"><?= $data['status_peminjaman'] ?></span></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    let table = new DataTable('#history');
  });
</script>