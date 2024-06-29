<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
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
        .btn-primary, .btn-danger {
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            color: #a2a4c2;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #343356;
            border: 1px solid #343356;
        }
        .btn-danger {
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Müşteri Listesi</h2>
        <a class="btn btn-primary" href="create.php" role="button">Müşteri Ekle</a>
        <a class="btn btn-primary" href="carikullaniciindex.php" role="button">Cari Ekle</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>İsim</th>
                    <th>E-Mail</th>
                    <th>Telefon</th>
                    <th>Adres</th>
                    <th>Tarih</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "9900";
                $database = "proje";

                $connection = new mysqli($servername, $username, $password, $database);
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM admin_paneli";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[adress]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Düzenle</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Sil</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
