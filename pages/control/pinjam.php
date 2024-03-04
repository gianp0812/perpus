<?php
include '../koneksi.php';

if (isset($_POST['pinjam'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_POST['userid'];
    $tanggal = $_POST['tanggal'];

    $query = query("INSERT INTO peminjaman (userid,bukuid,tanggal_peminjaman,status_peminjaman) VALUES ('$userid','$bukuid','$tanggal','dipinjam')");

    if ($query) {
        echo '<script>alert("Buku Berhasil Dipinjam");location.href="../?page=riwayat"</script>';
    }

}

if (isset($_POST['return'])) {
    $id = $_POST['peminjamanid'];
    $tanggal = $_POST['tanggal'];

    $return = query("UPDATE peminjaman SET tanggal_pengembalian='$tanggal',status_peminjaman='selesai' WHERE peminjamanid='$id'");

    if ($return) {
        echo '<script>alert("Buku Berhasil Dikembalikan");location.href="../?page=riwayat";</script>';
    }

}

?>