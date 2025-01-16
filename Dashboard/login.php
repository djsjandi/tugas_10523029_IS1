<?php
session_start();
if (isset($_SESSION['userid'])) {
    header("Location: welcome.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Set session variable to the provided email
    $_SESSION['userid'] = $email;
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>Login Dashboard</h1>
        <form method="POST">
            <div class="input-box">
                <input type="email" name="email" required placeholder="Email">
            </div>
            <div class="input-box">
                <input type="password" name="password" required placeholder="Password">
            </div>
            <button type="submit"><a href="index.php">Login</button>
        </form>
    </div>
</body>
</html>