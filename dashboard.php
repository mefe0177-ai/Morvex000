<?php require 'config/security.php'; if(!isset($_SESSION['user'])) header('Location: auth/login.php'); ?>
<h1>Panel</h1><a href="buy.php">Paketler</a>
<?php if($_SESSION['user']['role']==='admin'): ?><a href="admin/index.php">Admin</a><?php endif; ?>