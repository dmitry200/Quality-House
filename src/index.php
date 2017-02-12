<?php
  
  require_once "start.php";
  
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Строим интерактивную карту с помощью Raphael | Демонстрация для сайта RUSELLER.COM</title>
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
