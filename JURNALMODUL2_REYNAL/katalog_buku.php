<?php
include 'connect.php';

// (1.) Cek apakah ada data yang dikirim
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// (2.) Validasi input jika search input kurang dari 3 karakter
if (!empty($search) && strlen($search) < 3) {
    die("Pencarian harus minimal 3 karakter.");
}

// (3.) Validasi input jika search input tidak alphanumeric
if (!empty($search) && !preg_match("/^[a-zA-Z0-9 ]+$/", $search)) {
    die("Pencarian hanya boleh mengandung huruf dan angka.");
}

// (4.) Buat query untuk menampilkan data
$query = "SELECT * FROM tb_buku";
if (!empty($search)) {
    $query = "SELECT * FROM tb_buku WHERE judul LIKE '%$search%'";
}

// (5.) Jalankan query
$result = mysqli_query($conn, $query);

// (6.) Tampung hasil query ke dalam array
$bukus = [];
while ($buku = mysqli_fetch_assoc($result)) {
    $bukus[] = $buku;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h1>Katalog Buku</h1>
        <!-- (7.) Tambahkan Method GET -->
        <form action="katalog_buku.php" class="form-inline" method="GET">
            <!-- (8.) Tambahkan Value $search -->
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" value="<?= htmlspecialchars($search) ?>" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($bukus) == 0) : ?>
                    <tr>
                        <th colspan="5" class="text-center">TIDAK ADA DATA DALAM KATALOG</th>
                    </tr>
                <?php else: ?>
                    <?php foreach ($bukus as $buku) : ?>
                        <tr>
                            <td><?= $buku['id'] ?></td>
                            <td><?= htmlspecialchars($buku['judul']) ?></td>
                            <td><?= htmlspecialchars($buku['penulis']) ?></td>
                            <td><?= htmlspecialchars($buku['tahun_terbit']) ?></td>
                            <td>
                                <a href="edit_buku.php?id=<?= $buku['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?= $buku['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
