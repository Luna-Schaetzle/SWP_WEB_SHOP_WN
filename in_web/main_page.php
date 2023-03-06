<html>
<head>


</head>
<body>

<h1>Web@Shop</h1>
<p></p>
<p>Die Kategorien</p>

<p></p>
<p></p>
<p>Kategorie</p>
<form method='post' action='main_page.php'>
         <input type='text' name='kategorie'>
         <button type='submit'>suchen</button>
       </form>
<p></p>

<h3>Kategorie: 
<?php
$kategorie = $_REQUEST["kategorie"];
echo "$kategorie</h3>";
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$sql = "SELECT * from artikel where kategorie = '$kategorie';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1'>";
  echo "<tr>";
  echo "<th>Artikel ID</th>";
  echo "<th>Name</th>";
  echo "<th>Beschreibung</th>";
  echo "<th>Preis [€]</th>";
  echo "<th>Kategorie</th>";
  echo "</tr>";
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
  echo "Kategorie $kategorie ist nicht vorhanden";
  echo "vorhandene Kategorien: ";
  $sql = "SELECT * from kategorie;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
    echo "<li>".$row["kategorie"]."</li>";
    }
    echo "</ul>";
  }
  else {
  echo "error 0"; 
  }


}
$conn->close();
?>
    
</body>
</html>