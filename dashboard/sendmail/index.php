<?php session_start();
  if ($_SESSION["Pannel"] == false){
    header('Location: ../../login');
  }elseif (empty($_POST)) {
    header('Location: ../');
  }
 ?>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br><br>
    <div class="container">
    <form action="sendMail.php" method="post">
      <label for="fname">Thema/Überschrift</label>
      <input type="text" id="fname" name="Subject">

      <label for="lname">Empfängermail</label>
      <input type="text" id="lname" name="tomail" value="<?php echo $_POST['mail']; ?>">
      <label for="email">Empfängername</label>
      <input type="text" name="toname" value="<?php echo $_POST['name']; ?>">
      <!--  <label for="Thema">Nachricht</label>
      <select name="Thema">
        <option id="opt0" disabled selected>Thema wählen</option>
        <option id="opt1">iPad</option>
        <option id="opt2">Windows</option>
        <option id="opt3">MacOS</option>
        <option id="opt4">Moodle</option>
        <option id="opt5">iServ</option>
        <option id="opt6">Sonstiges</option>
      </select>-->

      <label for="subject">Nachricht</label>
      <textarea id="subject" name="msg" style="height:200px" value="<?php echo $_POST['from']; echo $_SESSION['user']; ?>"></textarea>

      <input type="submit" value="Absenden">
    </form>
    </div>
  </body>
</html>
<style media="screen">
body{
  margin: 0%;
}
#form{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 50%;
  margin-left: 25%;
  margin-right: 25%;
  text-align: left;
}
</style>
