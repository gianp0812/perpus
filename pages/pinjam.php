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
                    <div class="bg-gradient-success shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3" align="center">Pinjam Buku</h6>
                    </div>
                </div>
                <?php
                if (isset($_POST['user'])) {
                    $user = $_POST['user'];
                ?>
                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>PILIH BUKU</h3>
                        <form method="post">
                            <input type="hidden" name="user" value="<?= $user ?>">
                            <input type="text" name="nama_buku" placeholder="Cari judul buku..." style="width: 20% ;">
                            <button type="submit" class="btn btn-warning btn-sm mt-2">Cari</button>
                        </form>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class='text-center'>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>kategori</th>
                                        <th>Tahun Terbit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class='text-center'>
                                    <?php
                                    $no = 1;
                                    if (isset($_POST['nama_buku'])) {
                                        $nama_buku = $_POST['nama_buku'];
                                        $query1 = query("SELECT * FROM buku WHERE judul LIKE '%$nama_buku%'");
                                    } else {
                                        $query1 = query("SELECT * FROM buku");
                                    }

                                    while ($data1 = array1($query1)) {
                                        $dataid = $data1['bukuid'];
                                        $kategori = query("SELECT * FROM kategoribuku_relasi INNER JOIN kategoribuku ON kategoribuku_relasi.kategoriid=kategoribuku.kategoriid WHERE bukuid='$dataid'");
                                        $datakategori = array1($kategori);

                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data1['judul'] ?></td>
                                            <td><?= $data1['penulis'] ?></td>
                                            <td><?= $data1['penerbit'] ?></td>
                                            <td><?= (!empty($datakategori['nama_kategori']) ? $datakategori['nama_kategori'] : "") ?></td>
                                            <td><?= $data1['tahun_terbit'] ?></td>
                                            <td>
                                                <?php
                                                if ($data1['stok'] == 0) {
                                                    echo 'Stok Habis';
                                                } else {
                                                ?>
                                                    <form method="post">
                                                        <input type="hidden" name="id" value="<?= $user ?>">
                                                        <input type="hidden" name="buku" value="<?= $data1['bukuid'] ?>">
                                                        <button type="submit" class="btn btn-info btn-sm">Pilih</button>
                                                    </form>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                } else if (isset($_POST['buku'])) {
                    $buku = $_POST['buku'];
                    $id_user = $_POST['id'];

                    $query_buku = query("SELECT * FROM buku WHERE bukuid='$buku'");
                    $query_user = query("SELECT * FROM user WHERE userid='$id_user'");

                    $data_buku = array1($query_buku);
                    $data_user = array1($query_user);

                ?>

                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>Konfirmasi Peminjaman</h3>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <form method="post" action="control/pinjam.php">
                                    <tr class="text-right">
                                        <td>Nama Peminjam</td>
                                        <td>:</td>
                                        <td><?= $data_user['nama_lengkap'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Username Peminjam</td>
                                        <td>:</td>
                                        <td><?= $data_user['username'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Judul Buku</td>
                                        <td>:</td>
                                        <td><?= $data_buku['judul'] ?></td>
                                    </tr>
                                    <tr class="text-right">
                                        <td>Tanggal Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal" value="<?= date('Y-m-j') ?>" style="width: 60% ;">
                                            <input type="hidden" name="bukuid" value="<?= $buku ?>">
                                            <input type="hidden" name="userid" value="<?= $id_user ?>">
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class='text-end'>
                            <a href="?page=pinjam" class="btn btn-danger btn-sm">Kembali</a>
                            <button type="submit" name="pinjam" class="btn btn-info btn-sm">Konfirmasi</button>
                        </div>
                    </div>
                    </form>


                <?php
                } else {
                ?>
                    <div class="card-body px-0 pb-2 ms-4">
                        <h3 align='center'>PILIH USER</h3>
                        <div class="ms-4">
                            <form method="post">
                                <input type="text" name="nama_user" placeholder="Cari username..." style="width: 20% ;">
                                <button type="submit" class="btn btn-warning btn-sm mt-2">Cari</button>
                            </form>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
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
                                    if (isset($_POST['nama_user'])) {
                                        $nama_user = $_POST['nama_user'];
                                        $query = query("SELECT * FROM user WHERE role='anggota' AND username LIKE '%$nama_user%'");
                                    } else {
                                        $query = query("SELECT * FROM user WHERE role='anggota'");
                                    }

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
                                                <form method="post">
                                                    <input type="hidden" name="user" value="<?= $data['userid'] ?>">
                                                    <button type="submit" class="btn btn-info btn-sm">Pilih</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>