<?php
// Verbindung herstellen
$connection = new mysqli("localhost", "root", "zwiebel55", "web_shop");
if ($connection->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $connection->connect_error);
}

// Kategorie aus der Anfrage holen
$kategorie = $_GET["kategorie"];

// SQL-Abfrage vorbereiten und ausführen
$stmt = $connection->prepare("SELECT a.artikel_id,a.artikel_name, a.artikel_beschreibung,a.preis,b.kategorie,a.bild_url from artikel a inner join kategorien b on a.kID = b.kID where b.kategorie = ?");
$stmt->bind_param("s", $kategorie);
$stmt->execute();
$result = $stmt->get_result();

// Artikel in ein Array speichern
$artikel = [];
while ($row = $result->fetch_assoc()) {
    $artikel[] = $row;
}

// JSON-Antwort zurückgeben
echo json_encode($artikel);

// Verbindung schließen
$stmt->close();
$connection->close();
?>
