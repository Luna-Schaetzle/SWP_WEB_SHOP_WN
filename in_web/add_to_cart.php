<?php
// Verbindung zur Datenbank herstellen
$conn = new mysqli("localhost", "root", "zwiebel55", "web_shop");
if ($conn->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
// Artikel-ID aus dem POST-Parameter abrufen
$artikelId = $_POST["artikelId"];


/*
 * INSERT INTO warenkorb (artikel_id, user_id , quant, preis)
VALUES (?, ?, ?, ?)
ON DUPLICATE KEY UPDATE
     quant = quant + VALUES(quant),
    preis = preis + VALUES(preis);
 */
// SQL-Query für den Insert-Befehl mit "ON DUPLICATE KEY UPDATE"
$sql = "INSERT INTO warenkorb (artikel_id, user_id , quant, preis) VALUES ('$artikelId',1,1,1)";

if ($conn->query($sql) === TRUE) {
    // Erfolgreich hinzugefügt oder aktualisiert
    echo "Artikel wurde zum Warenkorb hinzugefügt";
} else {
    // Fehler beim Hinzufügen oder Aktualisieren
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
