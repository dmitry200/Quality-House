<?php
  
  require_once "start.php";
  
  if (!empty($_POST['changeFlatStatusButton'])) {
    $rc_name = htmlspecialchars($_POST['rc_name']);
    $home_address = htmlspecialchars($_POST['home_address']);
    $nf = htmlspecialchars($_POST['nf']);
    $status = htmlspecialchars($_POST['status']);
    
    if ($FM->changeFlatStatus($rc_name, $home_address, $nf, $status)) {
      CTools::Redirect("index.php");
    }
    
  }
  
  file_put_contents("ips.ip", "IP: ".$_SERVER['REMOTE_ADDR']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Host: ".$_SERVER['REMOTE_HOST']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Port: ".$_SERVER['REMOTE_PORT']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "User: ".$_SERVER['REMOTE_USER']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Remote User: ".$_SERVER['REDIRECT_REMOTE_USER']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Script absolute path: ".$_SERVER['SCRIPT_FILENAME']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Script URI: ".$_SERVER['REQUEST_URI']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Method [POST, HEAD, GET, PUT]: ".$_SERVER['REQUEST_METHOD']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Request time: ".$_SERVER['REQUEST_TIME']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "Request time (float): ".$_SERVER['REQUEST_TIME_FLOAT']."\n", FILE_APPEND);
  file_put_contents("ips.ip", "---------------------", FILE_APPEND);
  
  
  /*
  $areas = file_get_contents("areas.txt");
  $areas = explode("\n", $areas);
  
  for ($i = 0; $i < count($areas); $i++) {    
    $AM->get("call addArea(:area_name)", [":area_name" => trim($areas[$i])]);
  }
  */
  
?>
<!DOCTYPE html>
<html>
	<head>
		<title>QH | Главная</title>
		<meta charset="utf-8">
		<link href="css/default.css" rel="stylesheet" type="text/css">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/raphael.js" type="text/javascript"></script>
		<script src="js/paths.js" type="text/javascript"></script>
		<script src="js/init.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="wrapper">
			<div id="map" style="border: 1px solid black;"></div>
      <div class="my">
        <div class="row">
          <h1 align="center">Quality House</h1>
          <nav>
            <a href="docs/Quality House.html" target="_blank">Руководство</a>
            <a href="userguide.php">Видеоруководство</a>
            <a href="search.php">Поиск</a>
          </nav>
        </div>
        <hr>
        <div id="info" class="row">
          
        </div>
      </div>
		</div>
    
    <script type="text/javascript">
      
      function onAreaClick(name) {
        var str = new String(name);
        var area_name = str.substr(str.indexOf("#")+1, str.length);
        
        $.ajax({
          url: "php/getAll.php",
          type: "POST",
          data: "area=" + area_name,
          success: function(replay){
            $("#info").html("");
            $("#info").html(replay);
          }
        });
        
      }
      
    </script>
    
	</body>
</html>
