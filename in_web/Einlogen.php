<?php
session_start();
?>
<html>
<head>
    <title>Login</title>
    <style>  background-image: url('https://img.freepik.com/free-vector/set-torii-gates-water_52683-44986.jpg');
        background-size: auto;
        background-position: center;
        body {

            background-color: #f2f2f2;
        }
        div {
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="email"],
        input[type="password"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button:hover {
            background-color: #0069d9;
        }
        a {
            display: block;
            margin: 20px auto;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div>
<form method="post" action="Einlogen.php">
    <h1>Login</h1>
    <input type="email" name="Email" placeholder="Email" value="">
    <input type="password" name="psw" text="psw" placeholder="Password" value="">
    <button type="submit">Anmelden</button>

</form>
<button onclick="window.location.href='register.html';">Registrieren</button>
</div>
<?php
@$Email = $_REQUEST["Email"];
@$psw = $_REQUEST["psw"];

$servername = "localhost";
$username = "root";
$password = "zwiebel55";
$dbname = "web_shop";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$sql = "SELECT user_psw from users where user_email = '$Email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  if($row = $result->fetch_assoc()){
    if($row["user_psw"] == $psw){
        $_SESSION["Email"] = $Email;
        $sql = "SELECT user_id from users where user_email = '$Email';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row"
            if ($row = $result->fetch_assoc()) {
                $idofuser = $row["user_id"];
                $_SESSION["user_id"] = $idofuser;
            }
        }
      header("Location: "."main_page.php?kategorien=all");
      echo  "<h1>Test</h1>";
    }
    else  {
          echo  "<h1>Falsches Passwort</h1>";
        //header("Location: "."Einlogen.php?falschespsw=1");
    }
  }
  //echo "<h1>User oder Passwort Falsch</h1>";
}
else{
  //echo "<h1>User oder Passwort Falsch</h1>";

}

?>

</body>
</html>