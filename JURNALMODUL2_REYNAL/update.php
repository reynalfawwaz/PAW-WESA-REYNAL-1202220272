<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_POST['id'])) {
    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun terbit'];    

    // Buatlah query untuk update data
    $query = "UPDATE db_buku SET 
            id = '$id', 
            judul = '$judul',
            tahun_terbit = '$tahun_terbit'
            where id=$id";

    $result = mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>