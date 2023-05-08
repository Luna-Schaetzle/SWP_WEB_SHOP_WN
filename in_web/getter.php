<?php
// Parameter holen
$params = json_decode($_REQUEST["params"], false);

// Verbindung herstellen
$connection = new mysqli("localhost", "root", "", "artikeldb");
if ($connection->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}
// die Daten holen und JSON erzeugen:
$stmt = $connection->prepare(
    "SELECT artikelid, kopfzeile, zusammenfassung " .
    " FROM artikel WHERE themengebietid = ?");
$stmt->bind_param("i", $params->id);
$stmt->execute();
$resultset = $stmt->get_result();
$all = $resultset->fetch_all(MYSQLI_ASSOC);
echo json_encode($all);
?>
