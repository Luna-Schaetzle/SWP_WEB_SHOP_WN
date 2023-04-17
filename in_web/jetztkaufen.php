<?php
session_start();
?>
<html>
<head>
<title>Jetzt@Kaufen</title>
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
        div {
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        button, h3 {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button:hover {
            background-color: #0069d9;
        }
        a {
            display: block;
            margin: 20px auto;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>Web@shop</h1>
<p></p>
<h2>Jetzt@Kaufen</h2>
<?php
echo "<p>User: ".$_SESSION["Email"]."</p>";
//echo "<p>User ID: ".$_SESSION["user_id"]."</p>";
//echo "<a href='logout.php'>Logout</a><br>";
//echo "<br><a href='main_page.php?kategorien=all'>Zurück zur Warenübersicht</a><br>";
if ($_SESSION["Email"] == null){
    header("Location: logout.php");
}
?>

<button onclick="window.location.href='showwarenkorb.php';">show warenkorb</button>

<?php
$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$sql = "select sum(preis) from warenkorb where user_id = ".$_SESSION["user_id"].";";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    //echo "<h4>Gesamtsumme: ";

    while ($row = $result->fetch_assoc()) {
        echo "<h3>Gesamtsumme: ".$row["sum(preis)"]." €</h3><br>";
    }
    //echo "</h4>";
}
$conn->close();


echo "<ol><li><h4>Adresse:</h4>";
echo "<form action='gekauft.php' method='post'>";
//echo "<form action='jetztkaufen.php' method='post'>";
       echo     "<input type='text' name='strasse' placeholder='strasse'>";
       echo    "<input type='text' name='hausnummer' placeholder='hausnummer'>";
       echo    "<input type='text' name='plz' placeholder='plz'>";
       echo    "<input type='text' name='ort' placeholder='ort'>";
//echo "</form></li>";
echo "<br><li><h4>Bezahlmethode:</h4>";
//echo "<form action='jetztkaufen.php' method='post'>";
echo "<input type='radio' name='bezahlmethode' value='paypal'>Paypal<br>";
echo "<input type='radio' name='bezahlmethode' value='kreditkarte'>Kreditkarte<br>";
echo "<input type='radio' name='bezahlmethode' value='rechnung'>Rechnung<br>";
//echo "</form></li>";
echo "<br><li><h4>Bestätigung:</h4>";
//echo "<form action='jetztkaufen.php' method='post'>";
echo "<input type='checkbox' name='bestaetigung' value='bestaetigung'>Ich habe die AGB gelesen und akzeptiere diese<br>";
//echo "</form></li>";
echo "<br><li>Bestellung abschicken:";

echo "<input type='submit' name='abschicken' value='abschicken'>";
echo "</form></li>";
echo "</ol>";

?>
</body>
</html>