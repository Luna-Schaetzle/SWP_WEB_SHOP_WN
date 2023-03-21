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

echo "<p>Artikel_ID: ".$artikel_id."</p>";
echo "<p>Quant: ".$quant."</p>";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

//insert

$conn->close();
?>
</body>
</html>

