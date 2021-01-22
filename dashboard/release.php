<?php
session_start();
echo $_POST["button"];
if (!$_SESSION["Pannel"]==true) {
  echo $_SESSION["Keine Berechtigung"];
}
$servername = 'localhost';
$user = '';
$password = '';
$db = '';


$con = new mysqli($servername, $user, $password, $db);
if ($con->connect_error) {
  die('Fehler '.$con->connect_error);
}


 $button = htmlspecialchars(trim($_POST["button"]));
 $sql = $con->prepare("UPDATE Anfragen SET Status = 'free' WHERE ID = ? ");
 $sql->bind_param("i", $button);
 $sql->execute();
 header('Location: index.php');
 ?>
