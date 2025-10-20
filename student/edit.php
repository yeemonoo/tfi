<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");

include "Student.php";
$student = new Student();
$data = $student->getById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student->update($_GET['id'], $_POST['name'], $_POST['email'], $_POST['phone']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Edit Student</h3>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>