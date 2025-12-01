<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'superadmin') {
    die("Access Denied");
}

// Handle role update
if (isset($_POST['update_role'])) {
    $user_id = (int)$_POST['user_id'];
    $new_role = $_POST['role'];
    $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->execute([$new_role, $user_id]);
    header("Location: admin_users.php");
    exit;
}

// Handle delete
if (isset($_GET['delete'])) {
    $user_id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    header("Location: admin_users.php");
    exit;
}

// Fetch all users
$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap');

        body {
          font-family: "Merriweather", sans-serif, Times;
        }

        table { 
            border-collapse: collapse;
            width: 100%; 
        }
        th, td { 
            border: 1px solid #ccc;
            padding: 8px; text-align: left; 
        }
        th { 
            background: #eee; 
        }
        form { 
            display: inline; 
        }
    </style>
</head>
<body>
    <h2>Admin User Management</h2>
    <table>
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $user): ?>
    <tr>
        <td><?= $user['id']; ?></td>
        <td><?= htmlspecialchars($user['username']); ?></td>
        <td><?= htmlspecialchars($user['email']); ?></td>
        <td>
            <form method="POST">
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <select name="role">
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="superadmin" <?= $user['role'] === 'superadmin' ? 'selected' : ''; ?>>Superadmin</option>
                    <option value="author" <?= $user['role'] === 'author' ? 'selected' : ''; ?>>Author</option>
                </select>
                <button type="submit" name="update_role">Update</button>
            </form>
        </td>
        <td>
            <a href="?delete=<?= $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>

    </table>
    <p><a href="index.php">Back to Dashboard</a></p>
</body>
</html>