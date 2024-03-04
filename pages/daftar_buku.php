<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3" align="center">Daftar Buku</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <?php
          if ($level == 'anggota') {
          } else {
          ?>
            <button data-bs-toggle="modal" data-bs-target="#tambahbuku" class="btn btn-success btn-sm mr-6 ms-3">+ Tambah Buku</button>
          <?php
          }
          ?>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="buku">
              <thead class='text-center'>
                <tr>
                  <th>No</th>
                  <th>Judul Buku</th>
                  <th>Penulis</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>Kategori</th>
                  <th>Stok</th>
                  <th>Rating</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class='text-center'>
                <?php
                $no = 1;
                $query = query("SELECT * FROM buku");
                while ($data = array1($query)) {
                  $id = $data['bukuid'];

                  $query1 = query("SELECT * FROM kategoribuku INNER JOIN kategoribuku_relasi ON kategoribuku.kategoriid=kategoribuku_relasi.kategoriid WHERE kategoribuku_relasi.bukuid='$id'");
                  $data1 = array1($query1);
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['penulis'] ?></td>
                    <td><?= $data['penerbit'] ?></td>
                    <td><?= $data['tahun_terbit'] ?></td>
                    <td>
                      <?php
                      if (!empty($data1['nama_kategori'])) {
                        echo $data1['nama_kategori'];
                      } else {
                        if ($level == 'anggota') {
                          echo '';
                        } else {
                      ?>
                          <button data-bs-toggle="modal" data-bs-target="#kategori<?= $data['bukuid'] ?>" class="btn btn-success btn-sm">Kategorikan</button>
                      <?php
                        }
                      }
                      ?>
                    </td>
                    <td><?= $data['stok'] ?></td>
                    <td><a href="?page=ulasan&id=<?= $data['bukuid'] ?>" class="btn btn-info btn-sm">Lihat Ulasan</a></td>
                    <td>
                      <?php
                      if ($level == 'anggota') {
                        $bukuid = $data['bukuid'];
                        $userid = $_SESSION['user']['userid'];
                        $query_cek = query("SELECT * FROM koleksipribadi WHERE bukuid='$bukuid' AND userid='$userid'");
                        $query_Cek2 = query("SELECT * FROM ulasanbuku WHERE bukuid='$bukuid' AND userid='$userid'");

                        if (num_row1($query_cek) == 0) {
                      ?>
                          <button data-bs-toggle="modal" data-bs-target="#koleksi<?= $data['bukuid'] ?>" class="btn btn-success btn-sm">Koleksi</button>
                        <?php
                        } else {
                        ?>
                          <button data-bs-toggle="modal" data-bs-target="#hapuskoleksi<?= $data['bukuid'] ?>" class="btn btn-danger btn-sm">Koleksi</button>
                        <?php
                        }

                        if (num_row1($query_Cek2) == 0) {
                        ?>
                          <button data-bs-toggle="modal" data-bs-target="#beriulasan<?= $data['bukuid'] ?>" class="btn btn-success btn-sm">Ulas</button>

                        <?php
                        } else {
                        ?>
                          <button data-bs-toggle="modal" data-bs-target="#hapusulasan<?= $data['bukuid'] ?>" class="btn btn-danger btn-sm">Ulas</button>
                        <?php
                        }
                      } else {
                        ?>
                        <button data-bs-toggle="modal" data-bs-target="#editbuku<?= $data['bukuid'] ?>" class="btn btn-warning btn-sm">Edit</button>
                        <button data-bs-toggle="modal" data-bs-target="#hapusbuku<?= $data['bukuid'] ?>" class="btn btn-danger btn-sm mr-6 ms-3">Hapus</button>
                      <?php
                      }

                      ?>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="editbuku<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Buku</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Judul Buku</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['bukuid'] ?>">
                                <input type="text" name="judul" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['judul'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Penulis</label>
                              <div>
                                <input type="text" name="penulis" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['penulis'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Penerbit</label>
                              <div>
                                <input type="text" name="penerbit" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['penerbit'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Tahun Terbit</label>
                              <div>
                                <input type="number" min="1900" max="2099" name="tahun" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['tahun_terbit'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Stok</label>
                              <div>
                                <input type="number" min="1" name="stok" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['stok'] ?>" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="editbuku">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>


                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusbuku<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Buku</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Yakin Hapus Buku <strong><?= $data['judul'] ?></strong> ?</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['bukuid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="hapusbuku">Hapus</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Hapus Ulasan -->
                  <div class="modal fade" id="hapusulasan<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Ulasan</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Apakah Anda ingin menghapus ulasan anda tentang buku <strong><?= $data['judul'] ?> ?</strong></strong> ?</label>
                              <div>
                                <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                                <input type="hidden" name="userid" value="<?= $_SESSION['user']['userid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" name="hapusulasan">Hapus</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>


                  <!-- Modal Kategori -->
                  <div class="modal fade" id="kategori<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Kategorikan Buku</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Kategorikan Buku <strong><?= $data['judul'] ?></strong></label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['bukuid'] ?>">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Nama Kategori</strong></label>
                              <div>
                                <select name="nama_kategori" id="">
                                  <option value="" hidden>Pilih Kategori</option>
                                  <?php
                                  $query_kategori = query("SELECT * FROM kategoribuku");
                                  while ($data_kategori = array1($query_kategori)) {
                                  ?>
                                    <option value="<?= $data_kategori['kategoriid'] ?>"><?= $data_kategori['nama_kategori'] ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="kategori">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Ulasan -->
                  <div class="modal fade" id="beriulasan<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Ulas Buku</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Isi Ulasan</label>
                              <div>
                                <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                                <input type="hidden" name="userid" value="<?= $_SESSION['user']['userid'] ?>">
                                <input type="text" name="ulasan" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Rating</label>
                              <div>
                                <input type="number" min="1" max="10" name="rating" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="beriulasan">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Koleksi -->
                  <div class="modal fade" id="koleksi<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Koleksi Buku</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <?php
                        $bukuid = $data['bukuid'];
                        $userid = $_SESSION['user']['userid'];
                        $query_cek = query("SELECT * FROM koleksipribadi WHERE bukuid='$bukuid' AND userid='$userid'");

                        if (num_row1($query_cek) == 0) {
                        ?>
                          <form action="control/buku.php" method="post">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label class="form-label">Tambahkan Buku <strong><?= $data['judul'] ?></strong> Ke Koleksi ?</label>
                                <div>
                                  <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                                  <input type="hidden" name="userid" value="<?= $_SESSION['user']['userid'] ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="col-12">
                                  <div class="text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" name="tambahkoleksi">Tambahkan</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        <?php
                        } else {
                        ?>
                          <form action="control/buku.php" method="post">
                            <div class="modal-body">
                              <div class="mb-3">
                                <label class="form-label">Buku <strong><?= $data['judul'] ?></strong> Sudah Ada Di Koleksi, <strong>Apakah Anda ingin menghapusnya dari koleksi</strong> ?</label>
                                <div>
                                  <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                                  <input type="hidden" name="userid" value="<?= $_SESSION['user']['userid'] ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <div class="col-12">
                                  <div class="text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="hapuskoleksi">Hapus</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        <?php
                        }
                        ?>



                      </div>
                    </div>
                  </div>

                  <!-- Modal Hapus Koleksi -->
                  <div class="modal fade" id="hapuskoleksi<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus dari Koleksi</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/buku.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Buku <strong><?= $data['judul'] ?></strong> Sudah Ada Di Koleksi, <strong>Apakah Anda ingin menghapusnya dari koleksi</strong> ?</label>
                              <div>
                                <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                                <input type="hidden" name="userid" value="<?= $_SESSION['user']['userid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" name="hapuskoleksi">Hapus</button>
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
<div class="modal fade" id="tambahbuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Buku</h1>
            <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <form action="control/buku.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <div>
              <input type="text" name="judul" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Penulis</label>
            <div>
              <input type="text" name="penulis" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <div>
              <input type="text" name="penerbit" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <div>
              <input type="number" min="1900" max="2099" name="tahun" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Stok</label>
            <div>
              <input type="number" min="1" name="stok" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="modal-footer">
            <div class="col-12">
              <div class="text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambahbuku">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    let table = new DataTable('#buku');
  });
</script>