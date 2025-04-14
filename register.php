<?php
include 'db.php';
include 'encryption.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = encryptData($_POST["username"]);
    $password = encryptData($_POST["password"]);

    // Insert encrypted data with status 'pending'
    $query = "INSERT INTO users (username, password, status) VALUES (?, ?, 'pending')";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Waiting for admin approval.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error registering. Try again!');</script>";
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
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="index.php">Login here</a></p>
</body>
</html>
