<?php
$id = $_SESSION['user']['userid'];

if (isset($_POST['ubahpassword'])) {
    $pwlama = md5($_POST['pwlama']);
    $pwbaru = md5($_POST['pwbaru']);
    $pwconfirm = md5($_POST['pwconfirm']);

    if ($pwlama != $_SESSION['user']['password']) {
        echo '<script>alert("Password lama salah");</script>';
    } elseif ($_POST['pwbaru'] != $_POST['pwconfirm']) {
        echo '<script>alert("Konfirmasi Password dan Password Baru Tidak Sesuai");</script>';
    } elseif ($_POST['pwlama'] == $_POST['pwbaru']) {
        echo '<script>alert("Password baru dan password lama tidak boleh sama");</script>';
    } else {
        $query_ubah = query("UPDATE user SET password='$pwbaru' WHERE userid='$id'");

        if ($query_ubah) {
            echo '<script>alert("Password Berhasil di Ubah");</script>';
        }
    }
}
?>


<div class="continer-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h3>Profile</h3>
                </div>
                <div class="card-body text-bold">
                    <table class="table-responsive">
                        <tr>
                            <td width="200">Nama Lengkap</td>
                            <td width="200">:</td>
                            <td style="background-color: silver;" class="text-info"><input disabled value="<?= $_SESSION['user']['nama_lengkap'] ?>"></td>
                        </tr>
                        <tr>
                            <td width="200">Email</td>
                            <td width="200">:</td>
                            <td style="background-color: silver;" class="text-info"><input value="<?= $_SESSION['user']['email'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td width="200">Username</td>
                            <td width="200">:</td>
                            <td style="background-color: silver;" class="text-info"><input value="<?= $_SESSION['user']['username'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td width="200">Alamat</td>
                            <td width="200">:</td>
                            <td style="background-color: silver;" class="text-info"><input value="<?= $_SESSION['user']['alamat'] ?>" disabled></td>
                        </tr>
                    </table>
                    <form method="post">
                        <div class="mt-3">
                            PASSWORD :
                            <div class="row">
                                <div class="col-4 text-center">
                                    Password lama :
                                    <input type="password" name="pwlama" required>
                                </div>
                                <div class="col-4 text-center">
                                    Password Baru :
                                    <input type="password" name="pwbaru" required>

                                </div>
                                <div class="col-4 text-center">
                                    Konfirmasi Password Baru :
                                    <input type="password" name="pwconfirm" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="text-end">

                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="ubahpassword" class="btn btn-info ms-3">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>>
    </div>

    <?php
    if ($level == 'anggota') {
    ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 align="center">Koleksi Buku</h4>
                    </div>

                    <div class="card-body">
                        <table class="table align-item-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="text-left">
                                <?php
                                $no = 1;


                                $query = query("SELECT * FROM koleksipribadi INNER JOIN buku ON koleksipribadi.bukuid=buku.bukuid WHERE userid='$id'");

                                while ($data = array1($query)) {
                                    $id1 = $data['bukuid'];

                                    $query1 = query("SELECT * FROM kategoribuku INNER JOIN kategoribuku_relasi ON kategoribuku.kategoriid=kategoribuku_relasi.kategoriid WHERE kategoribuku_relasi.bukuid='$id1'");
                                    $data1 = array1($query1);
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['judul'] ?></td>
                                        <td><?= $data['penulis'] ?></td>
                                        <td><?= $data['penerbit'] ?></td>
                                        <td><?= $data['tahun_terbit'] ?></td>
                                        <td><?= (!empty($data1['nama_kategori']) ? $data1['nama_kategori'] : '-') ?></td>
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#koleksi<?= $data['bukuid'] ?>" class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- Modal Koleksi -->
                                    <div class="modal fade" id="koleksi<?= $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="col-12">
                                                        <div class="text-center">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Koleksi Buku</h1>
                                                            <button type="button" class="btn-close" style="float: right; margin-right: 0px; margin-top: -30px; background-color:black;" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="control/buku.php" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Hapus Buku <strong><?= $data['judul'] ?></strong> Dari Koleksi ? </label>
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
    <?php
    }
    ?>

</div>