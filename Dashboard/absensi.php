<?php
include 'config.php'; // Menghubungkan ke database

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    // Menyimpan data absensi ke database
    $sql = "INSERT INTO absensi (mahasiswa_id, tanggal, status) VALUES ('$mahasiswa_id', '$tanggal', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Data absensi berhasil disimpan.</div>";
    } else {
        echo "<div class='alert error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Mengambil data absensi dari database
$absensi = $conn->query("SELECT * FROM absensi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Menyertakan CSS -->
</head>
<body>
    <div class="container">
        <h1>Data Absensi</h1>
        <form method="POST" class="form">
            <input type="text" name="mahasiswa_id" placeholder="ID Mahasiswa" required>
            <input type="date" name="tanggal" required>
            <select name="status" required>
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
            <button type="submit">Tambah Absensi</button>
        </form>

        <h2>Daftar Absensi</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>ID Mahasiswa</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $absensi->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['mahasiswa_id']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <button class="exit-button" onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
    </div>
</body>
</html>