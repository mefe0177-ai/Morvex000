<?php require '../config/db.php'; require '../config/security.php';
$d=json_decode(file_get_contents('php://input'),true);
if(!csrf_check($d['csrf'])){http_response_code(403);exit;}
$q=$pdo->prepare('SELECT * FROM users WHERE email=?');
$q->execute([e($d['email'])]); $u=$q->fetch();
if($u && password_verify($d['password'],$u['password'])){$_SESSION['user']=$u; echo json_encode(['status'=>'ok']);}
else echo json_encode(['status'=>'error']);