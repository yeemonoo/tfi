<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");

include "Student.php";
$student = new Student();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student->add($_POST['name'], $_POST['email'], $_POST['phone']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Add Student</h3>
    <form method="POST">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
        </div>
        <button class="btn btn-success">Add</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>