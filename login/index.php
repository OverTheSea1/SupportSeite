<?php session_start(); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
  </head>
  <body>
    <div class="login-page">
  <div class="form">
    <form id="reg" action="register.php" method="post" class="register-form">
      <h4>Registrierung</h4>
      <span>Registriere dich nur, wenn du von einem Admin eingeladen wurdest sonst bringt dir dein Account nichts.</span><br><br>
      <input type="text" name="name" placeholder="Nutzername" required />
      <input type="text" name="mail" placeholder="Email Adresse" required>
      <input type="password" name="passwort" placeholder="Passwort" required>
      <label>Ich aktzeptiere die Nutzungsbedingungen</label><input class="AGB" type="checkbox" name="" required>
      <br><br>
      <button>registrieren</button>
      <p class="message">Schon registriert? <a onclick="login_register()">Anmelden</a></p>
    </form>
    <form id="log" class="login-form" action="index.php" method="post">
      <h4>Anmeldung</h4>
      <p>Mit dem Login stimmst du der Nutzung von Cookies zu<br><a href="/Datenschutz">Mehr Information</a></p>
      <input type="text" name="name" placeholder="Nutzername" <?php
      if (isset($_SESSION["Pannel"])) {

       if  ($_SESSION["Pannel"]==true) {echo "disabled";}} ?>/>
      <input type="password" name="Passwort" placeholder="Passwort" <?php if (isset($_SESSION["Pannel"])) { if ($_SESSION["Pannel"]==true) {echo "disabled";}} ?>/>
      <span id='wrong'>Falsche Email oder Passwort</span>
      <span id="notverified">Du bist nicht verifiziert <br> Bitte einen Admin dich zu verifizieren <br> <a href="not_verified">Hilfe</a> </span>
    <span style="<?php if (isset($_SESSION["Pannel"])) { if ($_SESSION["Pannel"]==true) {echo "display: block; color: red;";}}else {echo "display: none;";} ?>">Du bist schon eingeloggt <br> <a href="../dashboard">Zum Dashboard</a> <br> <a href="logut.php">Abmelden</a> </span>
      <button type="submit" <?php if (isset($_SESSION["Pannel"])) {if ($_SESSION["Pannel"]==true) {echo "disabled";}} ?>>login</button>
      <p class="message">Nicht registriert ? <a onclick="login_register()">Registrieren</a></p>
    </form>
  </div>
    </div>
    <?php
    if (empty($_POST['name']) OR empty($_POST['Passwort'])) {
      echo "<script> console.log('Warning: Global variables empty (index.php)'); </script>";
      die();
    }

    include '../resources/dblogin.php';


    $con = new mysqli($servername, $user, $password, $db);
    if ($con->connect_error) {
      die('Fehler: '.$con->connect_error);
    }


      $sql = $con->prepare("SELECT Name, Passwort, Supporter FROM `User_Support` WHERE Name = ?");
      $sql->bind_param("s", $_POST["name"]);
      $sql->execute();
      $sql->bind_result($res_Name, $res_pass, $res_Supp);
      $sql->fetch();

      if (password_verify($_POST['Passwort'],$res_pass)) {
          if ($res_Supp == true) {
            $_SESSION["Pannel"] = true;
            $_SESSION["user"] = $res_Name;
            header('Location: ../dashboard');
          }else {
            echo "<style>#notverified{display: block; color: red;}</style>";
          }
      }else {
        echo "<style>#wrong{display: block; color: red;}</style>";
      }

     ?>
  </body>
</html>
