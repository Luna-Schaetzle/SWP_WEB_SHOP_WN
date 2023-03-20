<?php
session_start();
?>
<html>
<head>

</head>
<body>
<p>Login</p>
<form method='post' action='Einlogen.php'>
         <input type='text' name='Email' placeholder='Email' value=""> <br>
         <input type='password' name='psw' text='psw' placeholder='Password' value=""> <br>
         <button type='submit'>Anmelden</button>
       </form>
<p></p>

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
      header("Location: "."main_page.php?kategorien=all");
      echo  "<h1>Test</h1>";
    }
  }
  else{
    echo  "<h1>Falsches Passwort</h1>";
  }
}
else{
  echo "<h1>User oder Passwort Falsch</h1>";

}

?>

</body>
</html>