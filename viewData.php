<?php
// JSON dosyasını oku
$jsonFile = 'veriler.json';

if (file_exists($jsonFile)) {
    $data = json_decode(file_get_contents($jsonFile), true);
    
    echo "<h2>Kaydedilen Veriler</h2>";
    echo "<pre>";
    print_r($data);  // JSON verisini düzgün şekilde görüntüle
    echo "</pre>";
} else {
    echo "Henüz veri kaydedilmedi.";
}
?>
