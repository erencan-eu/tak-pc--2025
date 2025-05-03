<?php
if (isset($_POST['submit'])) {
    $adana = $_POST['adana'];
    $sehir = $_POST['sehir'];
    $kutu_secimi = $_POST['kutu'];

    // Veritabanına kaydetme
    $pdo = new PDO('mysql:host=localhost;dbname=anket_paneli', 'root', ''); // Veritabanı bağlantı bilgilerini güncelleyin
    $stmt = $pdo->prepare("INSERT INTO anket_yanitlar (adana, sehir, kutu_secimi) VALUES (?, ?, ?)");
    $stmt->execute([$adana, $sehir, $kutu_secimi]);

    echo "Anket başarıyla gönderildi!";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anket</title>
</head>
<body>
    <form method="POST">
        <label for="adana">Adana:</label>
        <textarea name="adana" required></textarea><br>

        <label for="sehir">Şehir:</label>
        <textarea name="sehir" required></textarea><br>

        <label for="kutu">Seçiniz:</label>
        <select name="kutu" required>
            <option value="100">100</option>
            <option value="1000">1000</option>
            <option value="5000">5000</option>
            <option value="10000">10000</option>
        </select><br>

        <button type="submit" name="submit">Gönder</button>
    </form>
</body>
</html>
