document.addEventListener("DOMContentLoaded", function () {
    const kategorieElement = document.getElementById("kategorie");
    const inhaltElement = document.getElementById("inhalt");

    // Kategorien abrufen und Dropdown-Liste aktualisieren
    function getKategorien() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "get_kategorien.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const kategorien = JSON.parse(xhr.responseText);
                updateKategorien(kategorien);
            }
        };
        xhr.send();
    }

    // Dropdown-Liste mit Kategorien aktualisieren
    function updateKategorien(kategorien) {
        for (let i = 0; i < kategorien.length; i++) {
            const option = document.createElement("option");
            option.value = kategorien[i];
            option.textContent = kategorien[i];
            kategorieElement.appendChild(option);
        }
    }

    // Artikel anhand der ausgewählten Kategorie anzeigen
    function datenHolen() {
        const kategorie = kategorieElement.value;
        const url = "get_from_kategorie.php?kategorie=" + kategorie;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const artikel = JSON.parse(xhr.responseText);
                showArtikel(artikel);
            }
        };
        xhr.send();
    }

    function showArtikel(artikel) {
        inhaltElement.innerHTML = ""; // Vorherige Artikel löschen

        // Artikel anzeigen
        for (let i = 0; i < artikel.length; i++) {
            const item = document.createElement("div");
            item.classList.add("artikel");
            item.innerHTML = `
                <p>${artikel[i].artikel_id}</p>
                <p>${artikel[i].artikel_name}</p>
                <p>${artikel[i].artikel_beschreibung}</p>
                <p>${artikel[i].preis}</p>
                <p>${artikel[i].kategorie}</p>
                <p>${artikel[i].artikel_id}</p>
                <img src='${artikel[i].bild_url}'  width='auto' height='150'>
            `;
            inhaltElement.appendChild(item);
        }
    }

    // Kategorien abrufen und Dropdown-Liste initialisieren
    getKategorien();

    // Event Listener für Kategorieauswahl
    kategorieElement.addEventListener("change", datenHolen);
});

