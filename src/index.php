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

?>
<!DOCTYPE html>
<html>
	<head>
		<title>QH | Главная</title>
		<meta charset="utf-8">
		<link href="css/default.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/raphael.js" type="text/javascript"></script>
		<script src="js/paths.js" type="text/javascript"></script>
		<script src="js/init.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="wrapper">
		<div id="map"></div>
		<div class="my">
			<div class="row">
				<h1 align="center">Quality House</h1>
				<nav id="menu">
					<a href="docs/Quality House.html" target="_blank" class="btn btn-success btn-lg">Руководство</a>
					<a href="userguide.php" class="btn btn-success btn-lg">Видеоруководство</a>
					<a href="search.php" class="btn btn-success btn-lg">Поиск</a>
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
