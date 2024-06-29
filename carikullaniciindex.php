<?php
$servername = "localhost";
$username = "root";
$password = "9900";
$database = "proje";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM carikullanicilar";
$result = $connection->query($sql);
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
            max-width: 1000px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cari Listesi</h2>
        <a class="btn btn-primary" href="carikullanicicreate.php">Yeni Cari Ekle</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cari ID</th>
                    <th>İsim Soyisim</th>
                    <th>E-Mail</th>
                    <th>Şifre</th>
                    <th>Aktif</th>
                    <th>Kullanıcı Türü</th>
                    <th>Telefon</th>
                    <th>Doğrulama</th>
                    <th>Doğrulama Kodu</th>
                    <th>Son Giriş</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["cari_id"] . "</td>";
                        echo "<td>" . $row["isim_soyisim"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["sifre"] . "</td>";
                        echo "<td>" . $row["aktif"] . "</td>";
                        echo "<td>" . $row["kullanici_turu"] . "</td>";
                        echo "<td>" . $row["telefon"] . "</td>";
                        echo "<td>" . $row["dogrulama"] . "</td>";
                        echo "<td>" . $row["dogrulama_kodu"] . "</td>";
                        echo "<td>" . $row["songiris"] . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-outline-primary' href='carikullaniciedit.php?id=" . $row["id"] . "'>Düzenle</a> ";
                        echo "<a class='btn btn-outline-primary' href='carikullanicidelete.php?id=" . $row["id"] . "'>Sil</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>Kayıt bulunamadı</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$connection->close();
?>
