<?php
session_start();
if (!isset($_SESSION['user'])) header("Location: login.php");

include "Student.php";
$student = new Student();
$student->delete($_GET['id']);

header("Location: index.php");
exit();