<?php
include 'config.php'; // Menghubungkan ke database

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $nilai = $_POST['nilai'];

    // Menyimpan data nilai ke database
    $sql = "INSERT INTO nilai (mahasiswa_id, mata_kuliah, nilai) VALUES ('$mahasiswa_id', '$mata_kuliah', '$nilai')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>Data nilai berhasil disimpan.</div>";
    } else {
        echo "<div class='alert error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Mengambil data nilai dari database
$nilai = $conn->query("SELECT * FROM nilai");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Menyertakan CSS -->
</head>
<body>
    <div class="container">
        <h1>Input Nilai Mahasiswa</h1>
        <form method="POST" class="form">
            <input type="number" name="mahasiswa_id" placeholder="ID Mahasiswa" required>
            <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" required>
            <input type="number" name="nilai" step="0.01" placeholder="Nilai" required>
            <button type="submit">Simpan Nilai</button>
        </form>

        <h2>Daftar Nilai Mahasiswa</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>ID Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
            </tr>
            <?php while ($row = $nilai->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['mahasiswa_id']; ?></td>
                <td><?php echo $row['mata_kuliah']; ?></td>
                <td><?php echo $row['nilai']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <button class="exit-button" onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
    </div>
</body>
</html>