<?php
include "../koneksi.php";

if (isset($_POST['tambahuser'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    $cek_user = query("SELECT * FROM user WHERE username='$username'");
    $data_user = num_row1($cek_user);

    if ($data_user == 0) {
        $query = query("INSERT INTO user (username, password, nama_lengkap, email, alamat, role) VALUES ('$username','$password','$nama','$email','$alamat','$role')");

        if ($query) {
            echo '<script>alert("Data Berhasil DItambah");location.href="../?page=daftar_user"</script>';
        }
    } else {
        echo '<script>alert("Username Sudah Ada");location.href="../?page=daftar_user"</script>';
    }
}

if (isset($_POST['edituser'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $role = $_POST['role'];

    $cek_user = query("SELECT * FROM user WHERE userid!='$id' AND username='$username'");
    $data_user = num_row1($cek_user);

    if ($data_user == 0) {
        if ($_POST['password'] != "") {
            $query_up = query("UPDATE user SET nama_lengkap='$nama', username='$username', password='$password', email='$email', alamat='$alamat', role='$role' WHERE userid='$id'");
        } else {
            $query_up = query("UPDATE user SET nama_lengkap='$nama', username='$username', email='$email', alamat='$alamat', role='$role' WHERE userid='$id'");
        }

        if ($query_up) {
            echo '<script>alert("Data Berhasil Diubah");location.href="../?page=daftar_user"</script>';
        }
    } else {
        echo '<script>alert("Username Sudah Ada");location.href="../?page=daftar_user"</script>';
    }
}

if (isset($_POST['hapususer'])) {
    $id = $_POST['id'];

    $query_del = query("DELETE FROM user WHERE userid='$id'");

    if ($query_del) {
        echo '<script>alert("Data Berhasil Dihapus");location.href="../?page=daftar_user"</script>';
    }
}
