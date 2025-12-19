<?php 
include 'config.php';



 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

    if ($email === '' || $password === '') {
        die("All fields are required");
    }

    $stmt = $sql->select("users", ["*"], "email = ?", [$email]);
    $user = $stmt[0] ?? null;

    if (!$user) {
        die("User not found");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password");
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['username'] = $user['username'];

    if($user['role'] === 'superadmin') {
        header("Location: admin_users.php");
    } else {
        header("Location: index.php");
    }
    exit;









 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap');

        body {
          font-family: "Merriweather", sans-serif, Times;
        }
    </style>
</head>
<body>
    <div class="container col-md-6 mt-5">
        <h2>Login</h2>
        <form method="POST">
            <div class="mb-3">
                <p>
                    <label for="email" class="form-label">Email</label><br>
                    <input type="email" class= "form-control" name="email" required>
                </p>
            </div>
            <div class="mb-3">
                <p>
                    <label for="password" class="form-label">Password</label><br>
                    <input type="password" class="form-control" name="password" required>
                </p>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
</body>
</html>