<?php
session_start();
?>

<html>
<body>
<p>Test</p>

<?php
$artikel_id = $_REQUEST["artikel_id"];
$quant = $_REQUEST["quant"];


$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


echo "<p>Artikel_ID: ".$artikel_id."</p>";
echo "<p>Quant: ".$quant."</p>";

$sql = "select preis from artikel where artikel_id = ".$artikel_id.";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    //echo "<h4>Gesamtsumme: ";
    while ($row = $result->fetch_assoc()) {
        //echo "<h4>Gesamtsumme: ".$row["sum(a.preis)"]."</h4>";
        $sumepreis = $quant * $row["preis"];
    }
    //echo "</h4>";
}
echo "<p>Quant: ".$sumepreis."</p>";

//$sumepreis = $quant * $artikelpreis;

if ($quant > 0) {
// Create connection

    $sql = "insert into warenkorb values (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiid", $artikel_id, $_SESSION["user_id"], $quant, $sumepreis);
    @$stmt->execute();
    $stmt->close();

    $sql = "delete from warenkorb where quant = 0;";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param();
    @$stmt->execute();
    $stmt->close();
//insert

    $conn->close();
}
header("Location: main_page.php?kategorien=all");

?>
</body>
</html>

