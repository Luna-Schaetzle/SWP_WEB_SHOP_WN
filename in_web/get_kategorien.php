<?php
$connection = new mysqli("localhost", "root", "zwiebel55", "web_shop");
if ($connection->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}

$query = "SELECT *  FROM kategorien";
$result = $connection->query($query);

$kategorien = array();
while ($row = $result->fetch_assoc()) {
    $kategorien[] = $row['kategorie'];
}

echo json_encode($kategorien);
?>
