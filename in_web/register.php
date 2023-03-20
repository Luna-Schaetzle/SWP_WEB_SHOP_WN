<?php
session_start();
?>

<html>
<body>

<h1>Registrieren: </h1>

<form method='post' action='register.php'>
    <input type='text' name='user_nachname' placeholder='Nachname' value=""> <br>
    <input type='text' name='user_vorname' placeholder='Vorname' value=""> <br>
    <input type='text' name='user_email' placeholder='E Mail' value=""> <br>
    <input type='password' name='user_psw' placeholder='Password' value=""> <br>
    <input type='password' name='user_psw_repeat' placeholder='Password wiederholen' value=""> <br>
    <button type='submit'>Anmelden</button>
</form>
<p></p>
<?php
@$fail = $_REQUEST["error"];
if ($fail == 1){
    echo "<p>Passwort muss übereinstimmen</p>";
}
?>

<?php
@$user_nachname = $_REQUEST["user_nachname"];
@$user_vorname = $_REQUEST["user_vorname"];
@$user_email = $_REQUEST["user_email"];
@$user_psw = $_REQUEST["user_psw"];
@$user_psw_repeat = $_REQUEST["user_psw_repeat"];

if($user_psw != $user_psw_repeat){
    header("Location: register.php?error=1");
}
else {

    $servername = "localhost";
    $username = "root";
    $password = "zwiebel55";
    $dbname = "web_shop";

    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "insert into users values (null ,?,?,?,?)";

// prepared statement

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_nachname, $user_vorname, $user_psw, $user_email);
    @$stmt->execute();
    $stmt->close();
    $conn->close();

// Seite datenholen.php anzeigen
    $_SESSION["Email"] = $user_email;
    header("Location: main_page.php");


}

?>
</body>
</html>
