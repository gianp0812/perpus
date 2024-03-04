<?php
include "../koneksi.php";

if (isset($_POST['tambahbuku'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $query = query("INSERT INTO buku (judul, penulis, penerbit, tahun_terbit, stok) VALUES ('$judul','$penulis','$penerbit','$tahun','$stok')");

    if ($query) {
        echo '<script>alert("Data Berhasil Ditambah");location.href="../?page=daftar_buku";</script>';
    }
}

if (isset($_POST['editbuku'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $query_up = query("UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun', stok='$stok' WHERE bukuid='$id'");

    if ($query_up) {
        echo '<script>alert("Data Berhasil Diubah");location.href="../?page=daftar_buku";</script>';
    }
}

if (isset($_POST['hapusbuku'])) {
    $id = $_POST['id'];

    $query_del = query("DELETE FROM buku WHERE bukuid='$id'");

    if ($query_del) {
        echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=daftar_buku";</script>';
    }
}

if (isset($_POST['kategori'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_kategori'];

    $query_kategori = query("INSERT INTO kategoribuku_relasi (kategoribukuid, bukuid, kategoriid) VALUES (NULL,'$id','$nama')");

    if ($query_kategori) {
        echo '<script>alert("BUKU BERHASIL DIKATEGORIKAN");location.href="../?page=daftar_buku";</script>';
    }
}

if (isset($_POST['beriulasan'])) {
    $user = $_POST['userid'];
    $buku = $_POST['bukuid'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $query_ulasan = query("INSERT INTO ulasanbuku (userid,bukuid,ulasan,rating) VALUES ('$user','$buku','$ulasan','$rating')");

    if ($query_ulasan) {
        echo '<script>alert("Buku berhasil diberi rating");location.href="../?page=daftar_buku";</script>';
    }
}

if (isset($_POST['tambahkoleksi'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_POST['userid'];

    $query_addkol = query("INSERT INTO koleksipribadi (userid,bukuid) VALUES ('$userid','$bukuid')");

    if ($query_addkol) {
        echo '<script>alert("Buku Ditambahkan ke Koleksi");location.href="../?page=profile";</script>';
    }
}

if (isset($_POST['hapuskoleksi'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_POST['userid'];

    $query_delkol = query("DELETE FROM koleksipribadi WHERE userid='$userid' AND bukuid='$bukuid'");

    if ($query_delkol) {
        echo '<script>alert("Buku Dihapus Dari Koleksi");location.href="../?page=profile";</script>';
    }
}

if (isset($_POST['hapusulasan'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_POST['userid'];

    $query_delrate = query("DELETE FROM ulasanbuku WHERE userid='$userid' AND bukuid='$bukuid'");
    if ($query_delrate) {
        echo '<script>alert("Ulasan Berhasil DIhapus");location.href="../?page=daftar_buku";</script>';
    }
}
