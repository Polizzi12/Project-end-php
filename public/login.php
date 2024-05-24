<?php
require_once __DIR__ . '/../config/config.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $authenticatedUser = $user->authenticate($username, $password);

        if ($authenticatedUser) {
            $_SESSION['user_id'] = $authenticatedUser['id'];
            header('Location: admin/dashboard.php');
            exit;
        } else {
            $error = "Username o password non validi.";
        }
    } else {
        $error = "Username e password sono obbligatori.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="/project-end-php/css/style.css">
</head>
<body style="background-color: #8C8C8D; color:white;">

<div class="container">
    <h1>Login</h1>
    <?php if ($error): ?>
        <p style="color:red;"> <?php echo $error; ?> </p>
    <?php endif ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Invia</button>
    </form>
</div>
</body>
</html>