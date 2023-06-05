<?php

session_start();
//https://i.pinimg.com/originals/5f/26/e5/5f26e5822be11df1d3fbb53c938b8328.gif

if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}

$artikel_id = $_GET["artikelId"];
$quant = 1;
$user_id_for_cart = $_SESSION["user_id"];


$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


$sql = "select preis from artikel where artikel_id = ".$artikel_id.";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sumepreis = $quant * $row["preis"];
    }
}

// Create connection

    $sql = "INSERT INTO warenkorb (artikel_id, user_id , quant, preis)
VALUES (?, ?, ?, ?)
ON DUPLICATE KEY UPDATE
     quant = quant + VALUES(quant),
    preis = preis + VALUES(preis);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiid", $artikel_id, $user_id_for_cart, $quant, $sumepreis);
    @$stmt->execute();
    $stmt->close();

    $sql = "delete from warenkorb where quant = 0;";
    $stmt = $conn->prepare($sql);
//$stmt->bind_param();
    @$stmt->execute();
    $stmt->close();
//insert


    $conn->close();

?>
