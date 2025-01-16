<?php
include 'config.php'; // Menghubungkan ke database

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    // Menyimpan data mahasiswa ke database
    $sql = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Data mahasiswa berhasil disimpan.</div>";
    } else {
        echo "<div class='alert error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Mengambil data mahasiswa dari database
$mahasiswa = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Menyertakan CSS -->
</head>
<body>
    <div class="container">
        
        <h1><img src="mahasiswa.png" height="50">Data Mahasiswa</h1>
        <form method="POST" class="form">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="jurusan" placeholder="Jurusan" required>
            <button type="submit">Tambah Mahasiswa</button>
        </form>

        <h2>Daftar Mahasiswa</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
            </tr>
            <?php while ($row = $mahasiswa->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['jurusan']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <button class="exit-button" onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
    </div>
</body>
</html>