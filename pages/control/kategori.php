<?php
include "../koneksi.php";

if (isset($_POST['tambahkategori'])) {
    $nama = $_POST['nama'];

    $query = query("INSERT kategoribuku (nama_kategori) VALUES ('$nama')");

    if ($query) {
        echo '<script>alert("Data Berhasil Ditambah");location.href="../?page=kategori"</script>';
    }
}

if (isset($_POST['editkategori'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $query_up = query("UPDATE kategoribuku SET nama_kategori='$nama'WHERE kategoriid='$id'");

    if ($query_up) {
        echo '<script>alert("Data Berhasil Diubah");location.href="../?page=kategori"</script>';
    }
}

if (isset($_POST['hapuskategori'])) {
    $id = $_POST['id'];

    $query_del = query("DELETE FROM kategoribuku WHERE kategoriid='$id'");

    if ($query_del) {
        echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=kategori"</script>';
    }
}

?>