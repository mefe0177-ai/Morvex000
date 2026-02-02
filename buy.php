<?php require 'config/security.php'; require 'config/db.php';
$pk=$pdo->query('SELECT * FROM packages')->fetchAll();
foreach($pk as $p): ?>
<div class="card"><h3><?=e($p['name'])?></h3><p><?=$p['price']?>₺</p>
<form method="post" action="order.php"><input type="hidden" name="id" value="<?=$p['id']?>"><button>Satın Al</button></form></div>
<?php endforeach; ?>