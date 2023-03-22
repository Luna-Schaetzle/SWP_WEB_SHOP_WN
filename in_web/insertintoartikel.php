


<?php
$name = $_REQUEST["artikel_name"];   // Lesen der Parameter
$beschreibung = $_REQUEST["artikel_beschreibung"];
$preis = $_REQUEST["preis"];
$kID = $_REQUEST["kID"];
$bild_url = $_REQUEST["bild_url"];

$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$sql = "insert into artikel values (null,?,?,?,?,?)";

// prepared statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdis", $name,$beschreibung,$preis,$kID,$bild_url);
$stmt->execute();
$stmt->close();
$conn->close();

// Seite datenholen.php anzeigen
header("Location: main_page.php");
?>