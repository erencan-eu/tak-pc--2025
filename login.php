<?php
session_start();

if (isset($_POST['login'])) {
    $password = $_POST['password'];
    if ($password == 'adminw1') {
        $_SESSION['admin_loggedin'] = true;
        header('Location: admin_panel.php');
    } else {
        $error = "Yanlış admin şifresi!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <h1>Admin Giriş</h1>
        <label for="password">Admin Şifresi:</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Giriş Yap</button>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    </form>
</body>
</html>
