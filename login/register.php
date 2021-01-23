<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: 'Roboto', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;">
<?php

include '../resources/dblogin.php';


$con = new mysqli($servername, $user, $password, $db);
if ($con->connect_error) {
  die('Fehler '.$con->connect_error);
}
$usrname = htmlspecialchars(trim($_POST["name"]));
$pswd = password_hash($_POST["passwort"], PASSWORD_DEFAULT);
$mail = htmlspecialchars(trim($_POST["mail"]));



  $sql = $con->prepare("SELECT Name FROM User_Support WHERE Name = ?");
  $sql->bind_param("s", $usrname);
  $sql->execute();
  $sql->bind_result($m);
  $sql->fetch();
  $sql->close();


  if ($m == $usrname) {
    echo "<script>setTimeout(() => { history.back()}, 3000);</script>";
    die("<br><br><h2 style='text-align:center;'>Es tut uns leid, aber dieser Name ist leider schon vergeben</h2>");

  }

    $sql = $con->prepare("INSERT INTO User_Support (Name, Passwort, Mail) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $usrname, $pswd, $mail);
    $sql->execute();
    echo "Du bist nun registriert!";
    echo "<script>setTimeout(() => { window.location.href = 'index.php';}, 3000);</script>";
?>
</body>
</html>
