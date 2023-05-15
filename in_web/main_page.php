<?php
session_start();
?>
<html>
<head>
    <title>Web@Shop</title>
    <link rel="stylesheet" href="styles.css">


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

<?php
if ($_SESSION["Email"] == "Admin@Admin"){
    echo "<a href='eingabe_der_artikel_admin.html'>admin insert</a><br>";
}
?>
<p></p>

<label for="kategorie">Kategorie:</label>
<select id="kategorie">
</select>
<div id="inhalt">



<script src="script.js"></script>
</div>
</body>
</html>
