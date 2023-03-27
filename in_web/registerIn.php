<?php
session_start();
?>

<html>
<body>

</body>
</html>

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

    @$sql = "insert into users values (null ,?,?,?,?)";
    @$stmt = $conn->prepare($sql);
    @$stmt->bind_param("ssss", $user_nachname, $user_vorname, $user_psw, $user_email);
    @$stmt->execute();
    @$stmt->close();

    /*
    $sql = "insert into warenkorb values (null ,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_nachname, $user_vorname, $user_psw, $user_email);
    $stmt->execute();
    $stmt->close();
    */

    $sql = "SELECT user_id from users where user_email = '$user_email';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row"
        if ($row = $result->fetch_assoc()) {
            $idofuser = $row["user_id"];
            $_SESSION["user_id"] = $idofuser;
        }
    }
    $conn->close();

// Seite datenholen.php anzeigen
    $_SESSION["Email"] = $user_email;
    header("Location: main_page.php?kategorien=all");


}

?>
