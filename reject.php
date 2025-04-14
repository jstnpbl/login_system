<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $query = "UPDATE users SET status='rejected' WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('User rejected!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
