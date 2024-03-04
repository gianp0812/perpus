<?php
include 'koneksi.php';
if ($_SESSION['user']['role'] == 'anggota') {
?>
    <script>
        location.reload();
        alert("Anda Tidak Berhak Mengakses Halaman Ini");
        window.history.back();
    </script>
<?php
}
?>
<script>
    window.print();
</script>

<table border="1" width="100%" cellpading="5" cellspacing="0">
    <tr>
        <th colspan="9">Data peminjaman</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Peminjam</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Status</th>
    </tr>
    <tbody>
        <?php
        $no = 1;
        $query = query("SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.bukuid=buku.bukuid INNER JOIN user ON peminjaman.userid=user.userid ORDER BY peminjamanid DESC");

        while ($data = mysqli_fetch_array($query)) {
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