<?php
session_start();
?>
<html>
<head>
    <title>Ihr@Warenkorb</title>
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

</head>
<body>

<h1>Web@Shop</h1>
<p></p>
<h2>Ihr@Warenkorb</h2>
<?php
echo "<p>User: ".$_SESSION["Email"]."</p>";
//echo "<p>User ID: ".$_SESSION["user_id"]."</p>";
//echo "<a href='logout.php'>Logout</a><br>";
//echo "<br><a href='main_page.php?kategorien=all'>Zurück zur Warenübersicht</a><br>";
if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}
?>
<button onclick="window.location.href='logout.php';">Logout</button>
<br>
<p></p>
<button onclick="window.location.href='main_page.php?kategorien=all';">Main Page</button>
<p></p>

<?php
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


$sql = "select a.artikel_id,a.artikel_name, a.artikel_beschreibung,b.preis,b.quant,a.bild_url from artikel a inner join warenkorb b on a.artikel_id = b.artikel_id where b.user_id = ".$_SESSION["user_id"].";";

$result = $conn->query($sql);

//echo "<p>".$_SESSION["user"]."<p>";

if ($result->num_rows > 0) {
// output data of each row
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Artikel ID</th>";
    echo "<th>Name</th>";
    echo "<th>Beschreibung </th>";
    echo "<th>Gesamtpreis</th>";
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
        echo "<td>" . $row["preis"] . " €</td>";
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


//$sql = "select sum(quant) from warenkorb where user_id = ".$_SESSION["user_id"].";";
$sql = "select sum(preis) from warenkorb where user_id = ".$_SESSION["user_id"].";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    //echo "<h4>Gesamtsumme: ";

    while ($row = $result->fetch_assoc()) {
        echo "<h4>Gesamtsumme: ".$row["sum(preis)"]." €</h4>";
    }
    //echo "</h4>";
}

//echo "<p>".$_SESSION["user"]."<p>";

if ($result->num_rows > 0) {

}

?>

<button onclick="window.location.href='jetztkaufen.php';">jetzt kaufen</button>



</body>
</html>