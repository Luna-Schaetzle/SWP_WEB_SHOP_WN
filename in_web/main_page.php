<?php
session_start();
?>
<html>
<head>

    <title>Web@Shop</title>
    <!--<link rel="stylesheet" href="styles.css">--->
    <style>
        /* Allgemeine Styles */
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
            background-color: #f2f2f2;
            padding: 80px; /* Erhöhter Seitenabstand */
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 36px;
            font-weight: bold;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        p {
            margin: 10px 0;
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

        label {
            font-weight: bold;
        }

        select {
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            color: #333;
        }

        #inhalt {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .artikel-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            padding: 20px;
            text-align: center;
            width: 250px;
        }

        .artikel-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .artikel-img img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .artikel-details p {
            margin: 5px 0;
        }


        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .artikel-box {
                width: 100%;
            }
        }


    </style>


</head>
<body>
<body>
<h1>Web@Shop</h1>
<p></p>
<p></p>

<?php
if ($_SESSION["Email"] == null) {
    header("Location: logout.php");
}
echo "<p>User: " . $_SESSION["Email"] . "</p>";
?>

<button onclick="window.location.href='logout.php';">Logout</button>
<br>
<p></p>
<button onclick="window.location.href='showwarenkorb.php';">Warenkorb</button>

<p></p>

<?php
if ($_SESSION["Email"] == "Admin@Admin") {
    echo "<a href='eingabe_der_artikel_admin.html'>admin insert</a><br>";
}
?>
<p></p>

<label for="kategorie">Kategorie:</label>
<select id="kategorie">
</select>
<div id="inhalt"></div>

<script>
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
            const option = document.createElement("option");
            option.value = "Alle Kateogrien";
            option.textContent = "Alle Kateogrien";
            kategorieElement.appendChild(option);
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

        // Artikel zum Warenkorb hinzufügen
        function addToCart(artikelId) {
            const url = `add_to_cart.php?artikelId=${artikelId}`;
            const xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    //alert(xhr.responseText);
                    alert("Artikel wurde zum Warenkorb hinzugefügt");
                }
            };
            xhr.send();
        }

        // Artikel anzeigen
        function showArtikel(artikel) {
            inhaltElement.innerHTML = ""; // Vorherige Artikel löschen

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
                            <button class="kaufen-button" onclick="addToCart(${artikel[i].artikel_id});">Kaufen</button>
                        </div>
                    `;
                inhaltElement.appendChild(item);
            }
        }

        // Kategorien abrufen und Dropdown-Liste initialisieren
        getKategorien();

        // Event Listener für Kategorieauswahl
        kategorieElement.addEventListener("change", datenHolen);

        // Kaufbutton-Eventlistener
        inhaltElement.addEventListener("click", function (event) {
            if (event.target.classList.contains("kaufen-button")) {
                const artikelId = event.target.closest(".artikel-box").querySelector(".artikel-id").textContent;
                addToCart(artikelId);
            }
        });
    });
</script>
</body>
</html>
