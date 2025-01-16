<?php
include 'config.php'; // Menghubungkan ke database

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $mata_kuliah = $_POST['mata_kuliah'];

    // Menyimpan data dosen ke database
    $sql = "INSERT INTO dosen (nama, nip, mata_kuliah) VALUES ('$nama', '$nip', '$mata_kuliah')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Data dosen berhasil disimpan.</div>";
    } else {
        echo "<div class='alert error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Mengambil data dosen dari database
$dosen = $conn->query("SELECT * FROM dosen");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Menyertakan CSS -->
</head>
<body>
    <div class="container">
        <h1><img src="dosen.png" height="50">Data Dosen</h1>
        <form method="POST" class="form">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nip" placeholder="NIP" required>
            <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" required>
            <button type="submit">Tambah Dosen</button>
        
        </form>

        <h2>Daftar Dosen</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Mata Kuliah</th>
            </tr>
            <?php while ($row = $dosen->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nip']; ?></td>
                <td><?php echo $row['mata_kuliah']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <button class="exit-button" onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
    </div>
</body>
</html>