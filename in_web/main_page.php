<html>
<head>


</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "swp_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

$sql = "SELECT * from artikel;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1'>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["artikel_id"]. "</td>"; 
    echo "<td>" . $row["artikel_name"]. "</td>"; 
    echo "<td>" . $row["artikel_beschreibung"]. "</td>";
    echo "<td>" . $row["preis"]. "</td>";
    echo "<td>" . $row["kategorie"]. "</td>";
 
    //echo "<td> <a href='update.php?id=" . $row["id"]. "'>Daten Updaten</a></td>";
    echo "</tr>";
    }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
    
</body>
</html>