
 <?php
   session_start();
   if (!$_SESSION["Pannel"]==true) {
     die();
   }

  include '../resources/dblogin.php';

   $con = new mysqli($servername, $user, $password, $db);
   if ($con->connect_error) {
     die('Fehler '.$con->connect_error);
   }

   $id = htmlspecialchars(trim($_POST["button"]));
   $sql = $con->prepare("SELECT Status FROM Anfragen WHERE ID = ?");
   $sql->bind_param("s", $id);
   $sql->execute();
   $sql->bind_result($m);
   $sql->fetch();
   $sql->close();
   if ($m == "free") {

echo $id;


    $status = "claimed von " .  htmlspecialchars(trim($_SESSION['user']));
    $sql = $con->prepare("UPDATE `Anfragen` SET Status = ? WHERE ID = ?");
    $sql->bind_param("ss", $status, $id);

    $sql->execute();
    $sql->close();
    header('Location: index.php');
}else {

  die("Ein Fehler ist aufgetreten, die Anfrage ist schon von einem anderen Nutzer geclaimed <br> <a href='javascript:history.back()'>Zurück</a>");

}
  ?>
