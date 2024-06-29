<?php

// Veri tabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "9900";
$database = "proje";

// Bağlantıyı oluştur
$connection = new mysqli($servername, $username, $password, $database);

// Bağlantıyı kontrol et
if ($connection->connect_error) {
    die("Bağlantı hatası: " . $connection->connect_error);
}

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET["id"])) {
        header("Location: index.php");
        exit;
    }
    $id = $_GET["id"];

    // SQL sorgusunu hazırla ve çalıştır
    $sql = "SELECT * FROM admin_paneli WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["adress"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "Tüm alanlar doldurulmalıdır.";
            break;
        }

        $sql = "UPDATE admin_paneli SET name=?, email=?, phone=?, adress=? WHERE id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        $result = $stmt->execute();

        if (!$result) {
            $errorMessage = "Geçersiz sorgu: " . $connection->error;
            break;
        }

        $successMessage = "Kişi başarıyla güncellendi.";

        header("Location: index.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    
    <style>
        body {
            background-color: #efeff6;
            font-family: 'Circular Std Book';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #343356;
            border-color: #343356;
            color: #fff;
            padding: 5px 10px;
            margin-right: 5px;
        }
        .btn-outline-primary {
            background-color: transparent;
            color: #343356;
            border: 1px solid #343356;
            padding: 5px 10px;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-warning {
            background-color: #fcf8e3;
            border-color: #faebcc;
            color: #8a6d3b;
        }
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .btn-close {
            background: transparent;
            border: 0;
            appearance: none;
        }
        .form-control {
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }
        .row {
            margin-bottom: 15px;
        }
        .col-form-label {
            padding-top: 7px;
            padding-bottom: 7px;
            font-size: 14px;
            display: block;
        }
        .d-grid {
            display: inline-block;
        }
        .offset-sm-3 {
            margin-left: 0;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Müşteriyi Güncelle</h2>

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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-form-label" for="name">İsim</label>
                <div>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label" for="email">E-Mail</label>
                <div>
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label" for="phone">Telefon</label>
                <div>
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-form-label" for="address">Adres</label>
                <div>
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
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

            <div class="row mb-3">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Gönder</button>
                    <a class="btn btn-outline-primary" href="index.php" role="button">İptal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
