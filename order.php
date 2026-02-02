<?php require 'config/security.php'; require 'config/db.php';
if(!isset($_SESSION['user'])) exit;
$pdo->prepare('INSERT INTO orders(user_id,package_id,status) VALUES(?,?,?)')
->execute([$_SESSION['user']['id'],(int)$_POST['id'],'pending']);
header('Location: dashboard.php');