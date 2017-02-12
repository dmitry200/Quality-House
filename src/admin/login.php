<?php
  
  require_once "start.php";
  
  if (!isset($_SESSION['admin']) && empty($_SESSION['admin'])) {
    
    if (!empty($_POST['login_button'])) {
      $login = $_POST['login'];
      $password = $_POST['password'];
      
      if ($login == "admin" && $password == "admin") {
        $_SESSION['admin']['login'] = $login;
        $_SESSION['admin']['password'] = $password;
        
        
        CTools::Redirect("index.php");
      }
     
    }
    
  } else {
    CTools::Redirect("index.php");
  }
  
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Вход</title>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
    <br><br><br><br><br>
    <form name="login_form" class="block" method="POST">
      <div class="form-group">
        <label>Логин</label>
        <input type="text" name="login" required>
      </div>
      <div class="form-group">
        <label>Пароль</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" name="login_button" value="Войти">
      </div>
    </form>
	</body>
</html>
