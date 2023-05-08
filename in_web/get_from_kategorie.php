<?php
// Parameter holen
$params = json_decode($_REQUEST["kategorie"], false);

// Verbindung herstellen
$connection = new mysqli("localhost", "root", "zwiebel55", "web_shop");
if ($connection->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}
// die Daten holen und JSON erzeugen:
$stmt = $connection->prepare(
    "select a.artikel_id,a.artikel_name, a.artikel_beschreibung,a.preis,b.kategorie,a.bild_url from artikel a inner join kategorien b on a.kID = b.kID where b.kategorie = ?");
 $stmt->bind_param("s", $_REQUEST["kategorie"]);
$stmt->execute();
$resultset = $stmt->get_result();
$all = $resultset->fetch_all(MYSQLI_ASSOC);
echo json_encode($all);

?>
