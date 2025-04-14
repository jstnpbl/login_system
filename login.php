<?php
session_start();
include 'db.php';
include 'encryption.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch encrypted user data
    $query = "SELECT id, username, password, status FROM users WHERE status = 'approved'";
    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        // Decrypt stored username and password
        $db_username = decryptData($row["username"]);
        $db_password = decryptData($row["password"]);

        if ($db_username === $username && $db_password === $password) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $db_username;
            header("Location: dashboard.php");
            exit();
        }
    }

    echo "<script>alert('Invalid credentials or not approved yet!'); window.location.href='index.php';</script>";
}
?>
