<?php

session_start();

$koneksi = mysqli_connect('localhost','root','','db_perpustakaan_digital');

function query($sql) {
    global $koneksi;
    $query = mysqli_query($koneksi, $sql);

    return $query;
}

function array1($fetch) {
    return mysqli_fetch_array($fetch);
}

function num_row1($num_row){
    return mysqli_num_rows($num_row);
}


?>