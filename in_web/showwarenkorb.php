<?php
session_start();
?>
<html>
<head>


</head>
<body>

<h1>Web@Shop</h1>
<p></p>
<h2>Ihr@Warenkorb</h2>
<?php
echo "<p>User: ".$_SESSION["Email"]."</p>";
//echo "<p>User ID: ".$_SESSION["user_id"]."</p>";
echo "<a href='logout.php'>Logout</a><br>";
echo "<br><a href='main_page.php?kategorien=all'>Zurück zur Warenübersicht</a>";
if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}
?>


<?php
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


$sql = "";



?>



</body>
</html>