<?php
session_start();
include "User.php";

$user = new User();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($user->login($_POST['username'], $_POST['password'])) {
        $_SESSION['user'] = $_POST['username'];
        header("Location: index.php");
        exit();
    } else {
        $msg = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="col-md-4 offset-md-4">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-3">Login</h3>
            <?php if($msg): ?><div class="alert alert-danger"><?= $msg ?></div><?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>