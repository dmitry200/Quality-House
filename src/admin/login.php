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
      } else {
		echo "<script type='text/javascript'>alert('Неверные аутентификационные данные');</script>";
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
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
		<br><br><br><br><br>
		<div class="contaienr">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form name="login_form" method="POST">
					  <h1>Панель управления QH</h1>
					  <div class="form-group">
						<label>Логин</label>
						<input type="text" name="login" class="form-control" required>
					  </div>
					  <div class="form-group">
						<label>Пароль</label>
						<input type="password" name="password" class="form-control" required>
					  </div>
					  <div class="form-group">
						<input type="submit" name="login_button" value="Войти" class="btn btn-primary">
					  </div>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>
