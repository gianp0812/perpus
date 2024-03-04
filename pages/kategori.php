<?php
if ($level == 'anggota') {
?>
  <script>
    location.reload();
    alert("Anda Tidak Berhak Mengakses Halaman Ini");
    window.history.back();
  </script>
<?php
}
?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3" align="center">Daftar Kategori</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <button data-bs-toggle="modal" data-bs-target="#tambahkategori" class="btn btn-success btn-sm ms-3  ">+ Tambah Kategori</button>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class='text-center'>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class='text-center'>
                <?php
                $no = 1;
                $query = query("SELECT * FROM kategoribuku");

                while ($data = array1($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_kategori'] ?></td>
                    <td>
                      <button data-bs-toggle="modal" data-bs-target="#editkategori<?= $data['kategoriid'] ?>" class="btn btn-warning btn-sm">Edit</button>
                      <button data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $data['kategoriid'] ?>" class="btn btn-danger btn-sm mr-6 ms-3">Hapus</button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="editkategori<?= $data['kategoriid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Kategori</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/kategori.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Nama Kategori</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['kategoriid'] ?>">
                                <input type="text" name="nama" class="input-group input-group-outline focused is-focused" value="<?= $data['nama_kategori'] ?>" placeholder="Masukkan Data..." required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="editkategori">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapuskategori<?= $data['kategoriid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kategori</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/kategori.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Yakin Hapus Kategori <strong><?= $data['nama_kategori'] ?></strong> ?</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['kategoriid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="hapuskategori">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>


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


<!-- Modal Tambah -->
<div class="modal fade" id="tambahkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <form action="control/kategori.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <div>
              <input type="text" name="nama" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-12">
              <div class="text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambahkategori">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>