<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header('Location: login.php');
    exit;
}

// Veritabanı bağlantısı
$pdo = new PDO('mysql:host=localhost;dbname=anket_paneli', 'root', ''); // Veritabanı bilgilerinize göre güncelleyin
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Yanıtları çekme
$stmt = $pdo->query("SELECT * FROM anket_yanitlar");
$yanitlar = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Paneli</h1>
    <table>
        <thead>
            <tr>
                <th>Adana</th>
                <th>Şehir</th>
                <th>Kutu Seçimi</th>
                <th>Tarih</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($yanitlar as $yanit) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($yanit['adana']); ?></td>
                    <td><?php echo htmlspecialchars($yanit['sehir']); ?></td>
                    <td><?php echo htmlspecialchars($yanit['kutu_secimi']); ?></td>
                    <td><?php echo htmlspecialchars($yanit['tarih']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
