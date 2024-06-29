<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "9900";
    $database = "proje";

    $connection =  new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM admin_paneli WHERE id= $id";
    $connection->query($sql);
}

header("Location: index.php");
exit;
?>