<?php
if ($level == 'anggota' || $level == 'petugas') {
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
            <h6 class="text-white text-capitalize ps-3" align="center">Daftar User</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <button data-bs-toggle="modal" data-bs-target="#tambahuser" class="btn btn-success btn-sm ms-3">+ Tambah User</button>
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0" id="user">
              <thead class='text-center'>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class='text-center'>
                <?php
                $no = 1;
                $query = query("SELECT * FROM user ORDER BY role ASC");

                while ($data = array1($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td>
                      <button data-bs-toggle="modal" data-bs-target="#edituser<?= $data['userid'] ?>" class="btn btn-warning btn-sm">Edit</button>
                      <button data-bs-toggle="modal" data-bs-target="#hapususer<?= $data['userid'] ?>" class="btn btn-danger btn-sm mr-6 ms-3">Hapus</button>
                    </td>
                  </tr>

                  <!-- Modal Edit -->
                  <div class="modal fade" id="edituser<?= $data['userid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/user.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Nama Lengkap</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['userid'] ?>">
                                <input type="text" name="nama" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['nama_lengkap'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Username</label>
                              <div>
                                <input type="text" name="username" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['username'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Password</label>
                              <div>
                                <input type="password" name="password" class="input-group input-group-outline focused is-focused">
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Email</label>
                              <div>
                                <input type="email" name="email" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." value="<?= $data['email'] ?>" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <div>
                                <textarea name="alamat" id="" cols="56" rows="2"><?= $data['alamat'] ?></textarea>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label ms-3">Role</label>
                              <div>
                                <select name="role">
                                  <option value="admin" <?= ($data['role'] == 'admin' ? 'selected' : '') ?>>Admin</option>
                                  <option value="petugas" <?= ($data['role'] == 'petugas' ? 'selected' : '') ?>>Petugas</option>
                                  <option value="anggota" <?= ($data['role'] == 'anggota' ? 'selected' : '') ?>>Anggota</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="col-12">
                              <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edituser">Simpan</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapususer<?= $data['userid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-12">
                            <div class="text-center">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus User</h1>
                              <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                          </div>
                        </div>
                        <form action="control/user.php" method="post">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label">Yakin Hapus <strong><?= $data['nama_lengkap'] ?></strong> ?</label>
                              <div>
                                <input type="hidden" name="id" value="<?= $data['userid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <div class="text-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="hapususer">Simpan</button>
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
<div class="modal fade" id="tambahuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah User</h1>
            <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <form action="control/user.php" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <div>
              <input type="text" name="nama" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <div>
              <input type="text" name="username" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <div>
              <input type="password" name="password" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <div>
              <input type="email" name="email" class="input-group input-group-outline focused is-focused" placeholder="Masukkan Data..." required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <div>
              <textarea name="alamat" id="" cols="56" rows="2"></textarea>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label ms-3">Role</label>
            <div>
              <select name="role" id="" class="">
                <option hidden>Pilih Role...</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
                <option value="anggota">Anggota</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <div class="col-12">
            <div class="text-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="tambahuser">Simpan</button>
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
    let table = new DataTable('#user');
  });
</script>