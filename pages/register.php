<?php include 'config.php';



    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
    


        if($username === '') {
            $errors[] = "Username is required";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters";
        }
        
        //if email already exists
        if (empty($errors)) {
            $stmt = $pdo->prepare((new sqlcommands())->select("users", ["id"], "email = ?", ""));
            $stmt->execute([$email]);

            if ($stmt->fetch()) {
                $errors[] = "Email already registered";
            }
        }

        //hashing password and inserting as guest
        if (empty($errors)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare(
                "INSERT INTO users (username, email, password, role)
                VALUES (?, ?, ?, 'guest')"
            );

            $stmt->execute([$username, $email, $hashedPassword]);

            header("Location: index.php");
            exit;
      
      
      
        }


    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
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

        <h2 class="mb-4">Register</h2>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="register.php">

            <div class="mb-3 ">
                <label class="form-label">Username</label><br>
                <input class="form-control" type="text" name="username" required>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Email</label><br>
                <input class="form-control" type="email" name="email" placeholder="your.email@example.com" required>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Password</label><br>
                <input class="form-control" type="password" name="password" required>
            </div>

            <a href="index.php">
                <button type="submit" class="btn btn-primary">Register</button>
            </a>
        </form>
        
    </div>

</body>
</html>