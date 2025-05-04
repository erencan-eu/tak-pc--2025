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
