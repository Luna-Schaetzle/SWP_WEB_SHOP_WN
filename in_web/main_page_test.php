<?php
session_start();
?>
<html>
<head>
    <title>Web@Shop</title>
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

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 36px;
            font-weight: bold;
        }

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px 0 0 5px;
            border: none;
            width: 200px;
            font-size: 16px;
            color: #333;
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

        table, div {
            margin: 0 5%;
            border-collapse: collapse;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }



        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            display: block;
            margin: 0 auto;

        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }
        }

        #kategorie {
            font-size: 16px;
            font-family: Arial, sans-serif;
            padding: 8px;
            border-radius: 4px;
            background-color: #f2f2f2;
            border: none;
            outline: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            transition: box-shadow 0.3s ease;
        }

        #kategorie:hover, #kategorie:focus {
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        #kategorie option {
            font-size: 16px;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #fff;
        }

    </style>

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
<p></p>


<p></p>
<?php
if ($_SESSION["Email"] == "Admin@Admin"){
    echo "<a href='eingabe_der_artikel_admin.html'>admin insert</a><br>";
}
?>
<p></p>
<div id="inhalt"></div>
<select id="kategorie">
    <option value="communism">communism</option>
    <option value="Furry">Furry</option>
    <option value="SWP">SWP</option>
    <option value="IT">IT</option>
</select>
<button onclick="datenholen()">Daten holen</button>
<!---<h3>Kategorie:</h3>-->

    <script>

        function datenholen() {
            // AJAX Request aufbauen
            let x = new XMLHttpRequest();
            // Was ist zu tun, wenn die Daten vom Server kommen
            x.onload = function() {
                let arr  = JSON.parse(this.responseText);
                document.getElementById("inhalt").innerHTML =
                    formatResultAsHtmlTable(arr);
            };
            // Wer am Server liest die Daten
            // true -> asynchrone Abarbeitung
            x.open("GET","get_from_db.php", true);
            // Request senden
            x.send();
        }



        function show_artikel(idvalue) {
            // Objekt mit Parameterwerten als Attribute aufbauen
            let obj = {
                id: idvalue"
            };
            // und in einen String umwandeln
            let params = JSON.stringify(obj);
            // AJAX Request aufbauen
            let x = new XMLHttpRequest();
            // Was ist zu tun, wenn die Daten vom Server kommen
            x.onload = function() {
                let arr  = JSON.parse(this.responseText);
                document.getElementById("artikeldiv").innerHTML =
                    formatResultAsHtmlDefinitionList(arr);
            };

            // Wer am Server liest die Daten
            // true -> asynchrone Abarbeitung
            x.open("POST","get_from_kategorie.php?id=" , true);
            // Definiert das Format der Parameter beim Senden
            x.setRequestHeader("Content-type",
                "application/x-www-form-urlencoded");
            // Request senden mit Parameter Werten
            x.send("params="+params);
        }

        // Nun  als HTLM Definitionlist formatieren
        function formatResultAsHtmlDefinitionList(arr) {
            let s = "<dl>";
            for (let i = 0; i< arr.length; i++) {
                let obj = arr[i];
                s += "<dt >"+obj.kopfzeile+"</dt>";
                s += "<dd>"+obj.zusammenfassung+"</dd>";
            }
            return s + "</dl>";
        }

    </script>

</body>
</html>
