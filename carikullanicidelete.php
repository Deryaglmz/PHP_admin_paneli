<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "9900";
    $database = "proje";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM carikullanicilar WHERE id=$id";
    $connection->query($sql);
}

header("Location: carikuuliciindex.php");
exit;
?>
