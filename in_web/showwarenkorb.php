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
echo "<br><a href='main_page.php?kategorien=all'>Zurück zur Warenübersicht</a><br>";
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


$sql = "select a.artikel_id,a.artikel_name, a.artikel_beschreibung,a.preis,b.quant,a.bild_url from artikel a inner join warenkorb b on a.artikel_id = b.artikel_id where b.user_id = 1;";

$result = $conn->query($sql);

//echo "<p>".$_SESSION["user"]."<p>";

if ($result->num_rows > 0) {
// output data of each row
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Artikel ID</th>";
    echo "<th>Name</th>";
    echo "<th>Beschreibung </th>";
    echo "<th>Preis [€]</th>";
//echo "<th>kID</th>";
    echo "<th>Mänge</th>";
    echo "<th>Bild </th>";
    echo "<th>Entfehrnen</th>";

//echo "<th>kID</th>";

    echo "</tr>";


    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        //$artikleid = $row["artikel_id"];
        echo "<td>" . $row["artikel_id"] . "</td>";
        echo "<td>" . $row["artikel_name"] . "</td>";
        echo "<td>" . $row["artikel_beschreibung"] . "</td>";
        echo "<td>" . $row["preis"] . "</td>";
        //echo "<td>" . $row["kID"]. "</td>";
        echo "<td>" . $row["quant"] . "</td>";
        echo "<td><img src='" . $row["bild_url"] . "' width='auto' height='150'> </td>";
        echo "<td> <a href='ausdenwarenkorb.php?artikel_id=" . $row["artikel_id"] ."'>Löschen</a></td>";
        //echo "<td><form method='post' action='ausdenwarenkorb.php?artikel_id=" . $artikleid . "'>";
        //echo "     <input type='text' name='quant' placeholder='mänge' value='1'>";
        //echo "         <button type='submit'>Löschen </button>";
        echo "</td>";


        //echo "<td>" . $row["kID"]. "</td>";


        //echo "<td> <a href='update.php?id=" . $row["id"]. "'>Daten Updaten</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>



</body>
</html>