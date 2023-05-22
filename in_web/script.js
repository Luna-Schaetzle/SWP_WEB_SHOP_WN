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

    /*
    function showArtikel(artikel) {
        inhaltElement.innerHTML = ""; // Vorherige Artikel löschen

        // Artikel anzeigen
        for (let i = 0; i < artikel.length; i++) {
            const item = document.createElement("div");
            item.classList.add("artikel-box");
            item.innerHTML = `
            <div class="artikel-img">
                <img src="${artikel[i].bild_url}" alt="Artikelbild">
            </div>
            <div class="artikel-details">
                <p class="artikel-id">${artikel[i].artikel_id}</p>
                <p class="artikel-name">${artikel[i].artikel_name}</p>
                <p class="artikel-beschreibung">${artikel[i].artikel_beschreibung}</p>
                <p class="artikel-preis">${artikel[i].preis}</p>
                <p class="artikel-kategorie">${artikel[i].kategorie}</p>
            </div>
        `;
            inhaltElement.appendChild(item);
        }

   }
     */

    function showArtikel(artikel) {
        inhaltElement.innerHTML = ""; // Vorherige Artikel löschen

        // Artikel anzeigen
        for (let i = 0; i < artikel.length; i++) {
            const item = document.createElement("div");
            item.classList.add("artikel-box");
            item.innerHTML = `
                <div class="artikel-img">
                    <img src="${artikel[i].bild_url}" alt="Artikelbild">
                </div>
                <div class="artikel-details">
                    <p class="artikel-id">${artikel[i].artikel_id}</p>
                    <p class="artikel-name">${artikel[i].artikel_name}</p>
                    <p class="artikel-beschreibung">${artikel[i].artikel_beschreibung}</p>
                    <p class="artikel-preis">${artikel[i].preis}</p>
                    <p class="artikel-kategorie">${artikel[i].kategorie}</p>
                    <button class="kaufen-button" data-artikel-id="${artikel[i].artikel_id}">Kaufen</button>
                </div>
            `;
            inhaltElement.appendChild(item);
        }
    }

    // ... (vorhandener Code)

    // Event Listener für Kaufbutton
    inhaltElement.addEventListener("click", function (event) {
        if (event.target.classList.contains("kaufen-button")) {
            const artikelId = event.target.dataset.artikelId;
            addToCart(artikelId);
        }
    });

    // Artikel zum Warenkorb hinzufügen
    function addToCart(artikelId) {
        // Hier kannst du den Code hinzufügen, um die Artikel-ID zum Warenkorb hinzuzufügen
        // Zum Beispiel kannst du eine Funktion aufrufen, die die Artikel-ID speichert oder an einen Server sendet
        // Hier ist ein Beispiel:
        const warenkorb = document.getElementById("warenkorb");
         const row = document.createElement("tr");
         const cell = document.createElement("td");
         cell.textContent = artikelId;
        row.appendChild(cell);
        warenkorb.appendChild(row);
    }



    // Kategorien abrufen und Dropdown-Liste initialisieren
    getKategorien();

    // Event Listener für Kategorieauswahl
    kategorieElement.addEventListener("change", datenHolen);
});

