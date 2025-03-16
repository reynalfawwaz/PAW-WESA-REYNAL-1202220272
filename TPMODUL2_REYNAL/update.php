<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
include 'connect.php';

// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Periksa apakah request menggunakan metode POST dan ada parameter id
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data dari form
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $tahun_terbit = intval($_POST['tahun_terbit']);

    // Query untuk update data di database
    $query = "UPDATE tb_buku SET judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        header("Location: katalog_buku.php");
        exit();
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "');</script>";
    }
} else {
    echo "<script>alert('Permintaan tidak valid!');</script>";
}
?>
