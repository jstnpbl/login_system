<?php
include 'db.php';
include 'encryption.php';

// Approve user
if (isset($_POST["approve"])) {
    $id = $_POST["id"];
    $conn->query("UPDATE users SET status='approved' WHERE id=$id");
}

// Reject user (Remove from table)
if (isset($_POST["reject"])) {
    $id = $_POST["id"];
    $conn->query("DELETE FROM users WHERE id=$id");
}

// Decrypt and store in decrypted_users table (Prevent Duplicate Decryption)
if (isset($_POST["decrypt"])) {
    $id = $_POST["id"];

    // Check if user is already decrypted
    $check = $conn->prepare("SELECT * FROM decrypted_users WHERE username = (SELECT username FROM users WHERE id = ?)");
    $check->bind_param("i", $id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 0) { // If user is NOT already decrypted, decrypt
        $query = $conn->prepare("SELECT username, password FROM users WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            $decrypted_username = decryptData($row["username"]);
            $decrypted_password = decryptData($row["password"]);

            // Insert decrypted credentials into decrypted_users table
            $stmt = $conn->prepare("INSERT INTO decrypted_users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $decrypted_username, $decrypted_password);
            $stmt->execute();
        }
    } else {
        echo "<script>alert('This user is already decrypted!');</script>";
    }
}

// Fetch encrypted users
$users = $conn->query("SELECT * FROM users");

// Fetch decrypted users
$decrypted_users = $conn->query("SELECT * FROM decrypted_users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel</h2>

    <h3>Encrypted Credentials</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $users->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <?php if ($row["status"] == "pending") { ?>
                        <button type="submit" name="approve">Approve</button>
                        <button type="submit" name="reject">Reject</button>
                    <?php } elseif ($row["status"] == "approved") { ?>
                        <button type="submit" name="decrypt">Decrypt</button>
                    <?php } ?>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h3>Decrypted Credentials</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php while ($row = $decrypted_users->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["password"]; ?></td>
        </tr>
        <?php } ?>
    </table>

    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>
</html>
