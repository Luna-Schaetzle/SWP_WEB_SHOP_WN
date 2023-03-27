<?php
session_start();
?>
<html>
<head>
    <title>Web@Shop</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/free-vector/set-torii-gates-water_52683-44986.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            margin: 0 5%;
            border-collapse: collapse;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;

        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 36px;
            font-weight: bold;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px 0 0 5px;
            border: none;
            width: 200px;
            font-size: 16px;
            color: #333;
        }

        button {
            padding: 12px 24px;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #555;
        }

        table {
            margin: 0 5%;
            border-collapse: collapse;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            display: block;
            margin: 0 auto;

        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }
        }
    </style>

</head>
<body>

<h1>Web@Shop</h1>
<p></p>

<p></p>

<?php
if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}
echo "<p>User: ".$_SESSION["Email"]."</p>";
//echo "<p>User ID: ".$_SESSION["user_id"]."</p>";
//echo "<a href='logout.php'>Logout</a><br>";
//echo "<br><a href='showwarenkorb.php'>Warenkorb</a>";

?>

<button onclick="window.location.href='logout.php';">Logout</button>
<br>
<p></p>
<button onclick="window.location.href='showwarenkorb.php';">Warenkorb</button>

<p></p>
<p></p>

<form method='post' action='main_page.php'>
         <input type='text' name='kategorien' placeholder='Kategorie'>
         <button type='submit'>suchen</button>
       </form>
<p></p>
<?php
if ($_SESSION["Email"] == "Admin@Admin"){
    echo "<a href='eingabe_der_artikel_admin.html'>admin insert</a><br>";
}
?>
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
  echo "<th>Preis</th>";
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
    echo "<td>" . $row["preis"]. " €</td>";
    //echo "<td>" . $row["kID"]. "</td>";
    echo "<td>" . $row["kategorie"]. "</td>";
    echo "<td><img src='" . $row["bild_url"]. "' width='auto' height='150'> </td>";
    echo "<td><form method='post' action='indenwarenkorb.php?artikel_id=". $row["artikel_id"]."'>";
    echo "     <input type='number' name='quant' placeholder='mänge' value='1'>";
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
