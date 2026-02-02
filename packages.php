<?php
require "../config/security.php";
require "../config/db.php";

if ($_SESSION['user']['role'] !== 'admin') {
    exit("Yetkisiz erişim");
}

// Paketleri çek
$packages = $pdo->query("SELECT * FROM packages")->fetchAll();
?>

<h1>Paketler</h1>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Paket Adı</th>
    <th>Fiyat</th>
</tr>

<?php foreach ($packages as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= $p['price'] ?> ₺</td>
</tr>
<?php endforeach; ?>
</table>

<hr>

<h3>Yeni Paket Ekle</h3>
<form method="post">
    <input name="name" placeholder="Paket adı" required>
    <input name="price" type="number" placeholder="Fiyat" required>
    <button>Ekle</button>
</form>

<?php
// Yeni paket ekleme
if ($_POST) {
    $stmt = $pdo->prepare("INSERT INTO packages (name, price) VALUES (?,?)");
    $stmt->execute([$_POST['name'], $_POST['price']]);
    header("Location: packages.php");
}
?>