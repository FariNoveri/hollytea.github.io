<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi data tidak kosong
    if (!empty($username) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO register (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $password
            ]);
            echo "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Semua data harus diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="register.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
