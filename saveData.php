<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veri Kaydetme Paneli</title>
</head>
<body>
    <h2>Veri Gönder</h2>
    <form action="saveData.php" method="POST">
        <label for="adana">Adana:</label><br>
        <input type="text" id="adana" name="adana" required><br><br>
        
        <label for="sehir">Şehir:</label><br>
        <input type="text" id="sehir" name="sehir" required><br><br>
        
        <label for="kutucuk">Kutucuk (100, 1000, 5000, 10000):</label><br>
        <input type="text" id="kutucuk" name="kutucuk" required><br><br>
        
        <input type="submit" value="Veri Gönder">
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan gelen verileri al
    $adana = $_POST['adana'];
    $sehir = $_POST['sehir'];
    $kutucuk = $_POST['kutucuk'];

    // Verileri dizi olarak kaydet
    $data = [
        'adana' => $adana,
        'sehir' => $sehir,
        'kutucuk' => $kutucuk,
        'tarih' => date('Y-m-d H:i:s')  // Zaman bilgisini ekleyelim
    ];

    // Veriyi JSON formatında dosyaya kaydet
    $jsonFile = 'veriler.json';  // JSON dosyasının adı

    // Eğer dosya varsa, veriyi mevcut dosyaya ekle
    if (file_exists($jsonFile)) {
        $existingData = json_decode(file_get_contents($jsonFile), true);
    } else {
        $existingData = [];
    }

    // Yeni veriyi mevcut veriye ekle
    $existingData[] = $data;

    // Güncellenmiş veriyi JSON formatında kaydet
    file_put_contents($jsonFile, json_encode($existingData, JSON_PRETTY_PRINT));

    // Başarı mesajı
    echo "Veri başarıyla kaydedildi!";
} else {
    echo "Lütfen formu doğru şekilde doldurun.";
}
?>

