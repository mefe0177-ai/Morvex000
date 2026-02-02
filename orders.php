<?php
require "../config/security.php";
require "../config/db.php";

if ($_SESSION['user']['role'] !== 'admin') {
    exit("Yetkisiz erişim");
}

// Siparişleri çek
$sql = "
SELECT 
    orders.id,
    users.email,
    packages.name AS package_name,
    orders.status
FROM orders
JOIN users ON users.id = orders.user_id
JOIN packages ON packages.id = orders.package_id
ORDER BY orders.id DESC
";

$orders = $pdo->query($sql)->fetchAll();
?>

<h1>Siparişler</h1>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Kullanıcı</th>
    <th>Paket</th>
    <th>Durum</th>
</tr>

<?php foreach ($orders as $o): ?>
<tr>
    <td><?= $o['id'] ?></td>
    <td><?= htmlspecialchars($o['email']) ?></td>
    <td><?= htmlspecialchars($o['package_name']) ?></td>
    <td><?= $o['status'] ?></td>
</tr>
<?php endforeach; ?>
</table>