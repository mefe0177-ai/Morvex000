<?php require '../config/db.php'; require '../config/security.php';
if($_POST){
 $pdo->prepare('INSERT INTO users(email,password) VALUES(?,?)')
 ->execute([e($_POST['email']),password_hash($_POST['password'],PASSWORD_DEFAULT)]);
 header('Location: login.php'); }
?>
<form method="post" class="card"><input name="email" required><input name="password" type="password" required><button>Kayıt</button></form>