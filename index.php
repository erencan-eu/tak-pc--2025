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
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="anketForm">
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

    <!-- Loading Ekranı -->
    <div id="loading">Loading... Lütfen bekleyin...</div>

    <script>
        // AJAX ile veri gönderme işlemi
        $('#anketForm').submit(function(e) {
            e.preventDefault(); // Sayfa yenilenmesini engeller
            $('#loading').show(); // Loading ekranını göster

            var formData = $(this).serialize(); // Form verilerini al

            $.ajax({
                url: 'anket.php', // Veri gönderilecek PHP dosyası
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#loading').hide(); // Loading ekranını gizle
                    alert(response); // Sonuç mesajı göster
                },
                error: function() {
                    $('#loading').hide(); // Hata durumunda loading'i gizle
                    alert('Bir hata oluştu!');
                }
            });
        });
    </script>
</body>
</html>
