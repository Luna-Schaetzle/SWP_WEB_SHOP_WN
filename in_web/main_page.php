<?php
session_start();
?>
<html>
<head>


</head>
<body>

<h1>Web@Shop</h1>
<p></p>

<p></p>
<p>Die Kategorien</p>
<?php
echo "<p>User: ".$_SESSION["Email"]."</p>";
echo "<a href='logout.php'>Logout</a>";
if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}
?>
<p></p>
<p></p>

<form method='post' action='main_page.php'>
         <input type='text' name='kategorien' placeholder='Kategorie'>
         <button type='submit'>suchen</button>
       </form>
<p></p>

<h3>Kategorie: 
<?php
@$kategorien = $_REQUEST["kategorien"];
echo "$kategorien</h3>";
//echo "<p>".$_SESSION["Email"]."</p>";
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

//$sql = "SELECT * from artikel a inner join kategorien b on a.kID = b.kID where b.kategorie = '$kategorien';";
if($kategorien == 'all'){
    $sql = "SELECT a.artikel_id,a.artikel_name, a.artikel_beschreibung,a.preis,b.kategorie,a.bild_url from artikel a inner join kategorien b on a.kID = b.kID;";
}
else {
    $sql = "SELECT a.artikel_id,a.artikel_name, a.artikel_beschreibung,a.preis,b.kategorie,a.bild_url from artikel a inner join kategorien b on a.kID = b.kID where b.kategorie = '$kategorien';";
}


//$sql = "SELECT * from artikel where kategorien = '$kategorien';";
$result = $conn->query($sql);

//echo "<p>".$_SESSION["user"]."<p>";

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1'>";
  echo "<tr>";
  echo "<th>Artikel ID</th>";
  echo "<th>Name</th>";
  echo "<th>Beschreibung</th>";
  echo "<th>Preis [€]</th>";
  //echo "<th>kID</th>";
  echo "<th>Kategorie</th>";
  echo "<th>Bild</th>";
  //echo "<th>kID</th>";
  
  echo "</tr>";


  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["artikel_id"]. "</td>";
    echo "<td>" . $row["artikel_name"]. "</td>"; 
    echo "<td>" . $row["artikel_beschreibung"]. "</td>";
    echo "<td>" . $row["preis"]. "</td>";
    //echo "<td>" . $row["kID"]. "</td>";
    echo "<td>" . $row["kategorie"]. "</td>";
    echo "<td><img src='" . $row["bild_url"]. "' width='auto' height='150'> </td>";
    echo "<td><form method='post' action='indenwarenkorb.php?artikel_id=". $row["artikel_id"]."'>";
    echo "     <input type='text' name='quant' placeholder='mänge' value='1'>";
    echo "         <button type='submit'>In den Warenkorb</button>";
    echo "      </form></td>";


      //echo "<td>" . $row["kID"]. "</td>";
      
    
    //echo "<td> <a href='update.php?id=" . $row["id"]. "'>Daten Updaten</a></td>";
    echo "</tr>";
    }
  echo "</table>";
} else {
  echo "Kategorie $kategorien ist nicht vorhanden / leer, ";
  echo "vorhandene Kategorien: ";
  echo "<ul>";
  echo "<li>all</li>";
  $sql = "SELECT * from kategorien;";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

   
    while($row = $result->fetch_assoc()) {
    echo "<li>".$row["kategorie"]."</li>";
    }
    echo "</ul>";
    
    echo "<p></p><p></p><p></p><p></p>";
    echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Stylized_uwu_emoticon.svg/1200px-Stylized_uwu_emoticon.svg.png' width='500' height='250'>";
  }
  else {
  echo "error 0"; 
  }


}
$conn->close();
?>
    
</body>
</html>
