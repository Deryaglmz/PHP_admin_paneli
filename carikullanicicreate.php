<?php
$servername = "localhost";
$username = "root";
$password = "9900";
$database = "proje";
$connection = new mysqli($servername, $username, $password, $database);

$cari_id = "";
$isim_soyisim = "";
$email = "";
$sifre = "";
$aktif = "";
$kullanici_turu = "";
$telefon = "";
$dogrulama = "";
$dogrulama_kodu = "";
$songiris = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $cari_id = $_POST["cari_id"];
    $isim_soyisim = $_POST["isim_soyisim"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $aktif = $_POST["aktif"];
    $kullanici_turu = $_POST["kullanici_turu"];
    $telefon = $_POST["telefon"];
    $dogrulama = $_POST["dogrulama"];
    $dogrulama_kodu = $_POST["dogrulama_kodu"];
    $songiris = $_POST["songiris"];

    do {
        if (empty($cari_id) || empty($isim_soyisim) || empty($email) || empty($sifre) || empty($aktif) || empty($kullanici_turu) || empty($dogrulama)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "INSERT INTO carikullanicilar (cari_id, isim_soyisim, email, sifre, aktif, kullanici_turu, telefon, dogrulama, dogrulama_kodu, songiris) VALUES ('$cari_id', '$isim_soyisim', '$email', '$sifre', '$aktif', '$kullanici_turu', '$telefon', '$dogrulama', '$dogrulama_kodu', '$songiris')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $cari_id = "";
        $isim_soyisim = "";
        $email = "";
        $sifre = "";
        $aktif = "";
        $kullanici_turu = "";
        $telefon = "";
        $dogrulama = "";
        $dogrulama_kodu = "";
        $songiris = "";

        $successMessage = "Client added correctly";

        header("Location: index.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Kullanıcı</title>
    <style>
        body {
            background-color: #efeff6;
            font-family: 'Circular Std Book';
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-outline-primary {
            padding: 5px 10px;
            text-decoration: none;
            display: inline-block;
            color: #fff;
            border-radius: 5px;
            text-align: center;
        }
        .btn-primary {
            background-color: #343356;
            border: 1px solid #343356;
            margin-right: 5px;
        }
        .btn-outline-primary {
            background-color: transparent;
            border: 1px solid #343356;
            color: #343356;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .btn-close {
            padding: 1px 10px;
            background: transparent;
            border: 0;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Yeni Cari Kullanıcı</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="cari_id">Cari ID</label>
                <input type="text" name="cari_id" value="<?php echo $cari_id; ?>">
            </div>

            <div class="form-group">
                <label for="isim_soyisim">İsim Soyisim</label>
                <input type="text" name="isim_soyisim" value="<?php echo $isim_soyisim; ?>">
            </div>

            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="text" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="text" name="sifre" value="<?php echo $sifre; ?>">
            </div>

            <div class="form-group">
                <label for="aktif">Aktif</label>
                <input type="text" name="aktif" value="<?php echo $aktif; ?>">
            </div>

            <div class="form-group">
                <label for="kullanici_turu">Kullanıcı Türü</label>
                <input type="text" name="kullanici_turu" value="<?php echo $kullanici_turu; ?>">
            </div>

            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" name="telefon" value="<?php echo $telefon; ?>">
            </div>

            <div class="form-group">
                <label for="dogrulama">Doğrulama</label>
                <input type="text" name="dogrulama" value="<?php echo $dogrulama; ?>">
            </div>

            <div class="form-group">
                <label for="dogrulama_kodu">Doğrulama Kodu</label>
                <input type="text" name="dogrulama_kodu" value="<?php echo $dogrulama_kodu; ?>">
            </div>

            <div class="form-group">
                <label for="songiris">Son Giriş</label>
                <input type="text" name="songiris" value="<?php echo $songiris; ?>">
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
            ?>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Gönder</button>
                <a class="btn btn-outline-primary" href="index.php" role="button">İptal</a>
            </div>
        </form>
    </div>
</body>
</html>
