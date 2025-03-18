<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_POST['id'])) {
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $tahunterbit = $_POST["tahun terbit"];
    // Definisikan query untuk insert data
    $query = "INSERT INTO tb_buku (judul , penulis, tahun_terbit) VALUES ($judul, $penulis, $tahunterbit)";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>