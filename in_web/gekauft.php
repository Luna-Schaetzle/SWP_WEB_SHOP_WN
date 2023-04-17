<?php
session_start();
?>
<html>
<head>
      <title>Web@Shop</title>
</head>
<body>

<?php
$strasse = $_REQUEST["strasse"];
$hausnummer = $_REQUEST["hausnummer"];
$plz = $_REQUEST["plz"];
$ort = $_REQUEST["ort"];
$bezahlmethode = $_REQUEST["bezahlmethode"];
//$bestätigung = $_REQUEST["bestätigung"];

echo "<p>Strasse: ".$strasse."</p>";
echo "<p>Hausnummer: ".$hausnummer."</p>";
echo "<p>PLZ: ".$plz."</p>";
echo "<p>Ort: ".$ort."</p>";
echo "<p>Bezahlmethode: ".$bezahlmethode."</p>";
//echo "<p>Bestätigung: ".$bestätigung."</p>";

// Create connection
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}



?>

</body>
</html>
