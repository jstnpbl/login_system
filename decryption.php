<?php
include 'db.php';
include 'encryption.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $decrypted_username = decryptData($_POST["username"]);
    $decrypted_password = decryptData($_POST["password"]);

    $query = "INSERT INTO decrypted_users (decrypted_username, decrypted_password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $decrypted_username, $decrypted_password);

    if ($stmt->execute()) {
        echo "Decryption successful! Data saved.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
