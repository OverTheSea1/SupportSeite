<!DOCTYPE html>
<html lang="de" dir="ltr">
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
  -moz-osx-font-smoothing: grayscale; text-align: center;">

    <?php

      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("<h2 style='text-align: center;'>Bitte geben sie eine richtige Email Adresse an</h2> <br> <a style='text-align: center;' href='javascript: history.back();'> zurück </a>" . "<script>setTimeout(() => { window.history.back() }, 3000);</script>");
      }elseif (empty($_POST['Vorname']) OR empty($_POST['Nachname']) OR empty($_POST['Nachricht'])) {
        die("<h2 style='text-align: center;'>Bitte füllen sie alle Felder aus</h2> <br> <a style='text-align: center;' href='javascript: history.back();'> zurück </a>" . "<script>setTimeout(() => { window.history.back() }, 3000);</script>");
      }

        $servername = 'localhost';
        $user = '';
        $password = '';
        $db = '';

        $con = new mysqli($servername, $user, $password, $db);
        if ($con->connect_error) {
          die('Fehler '.$con->connect_error);
        }else {

        }


        $name = htmlspecialchars(trim($_POST["Vorname"])) . " " . htmlspecialchars(trim($_POST["Nachname"]));
        $mail = htmlspecialchars(trim($_POST["email"]));
        $nachricht = htmlspecialchars(trim($_POST["Nachricht"]));
        $thema = $_POST["Thema"];


        $sql = $con->prepare("INSERT INTO Anfragen (Name, Mail, Nachricht, Thema) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $name, $mail, $nachricht, $thema);
        $sql->execute();
        header('Location: index.html');
     ?>
  </body>
</html>
