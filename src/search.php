<?php

  require_once "start.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>QH | Поиск</title>
		<meta charset="utf-8">
		<script src="js/jquery.js" type="text/javascript"></script>
    <style rel="stylesheet" type="text/css">

      nav{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
      }

      fieldset{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }

      .info{

        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }

      .one_flat{
        margin: 10px;
        padding: 5px;
        border: 1px solid black;
      }

      nav {
        display: flex;
        justify-content: space-around;
      }


      nav a {
      	text-decoration: none;
      	border: 1px solid black;
      	padding: 10px;
      	transition-property: all;;
      	transition-duration: 0.3s;
      }

      nav a:hover{
      	transform: translate(0px, 4px);
      }


    </style>
	</head>
	<body>
		<div class="wrapper">
      <div class="my">
        <div class="row">
          <h1 align="center">Quality House</h1>
          <nav>
            <a href="index.php">Главная</a>
            <a href="docs/Quality House.html" target="_blank">Руководство</a>
            <a href="userguide.php">Видеоруководство</a>
          </nav>
        </div>
        <hr>
        <label>Кол-во комнат:</label>
        <input type="number" name="count_rooms">
        <label>Балкон:</label>
        <select name="balcony">
          <option value="0">Нет</option>
          <option value="1">Есть</option>
        </select>
        <label>Площадь</label>
        <input type="number" name="square">
        <label>Стоимость</label>
        <input type="number" name="price">
        <input type="submit" name="searchFlatsButton" value="Найти">
        <div id="info" class="row">
        </div>
      </div>
		</div>

    <script type="text/javascript">

      $("[name='searchFlatsButton']").click(function(){

        var count_rooms = $("[name='count_rooms']").val();
        var balcony = $("[name='balcony']").val();
        var square = $("[name='square']").val();
        var price = $("[name='price']").val();

        $.ajax({
          url: "php/search.php",
          type: "POST",
          data: "count_rooms=" + count_rooms + "&balcony=" + balcony + "&square=" + square + "&price=" + price,
          success: function(replay){
            $("#info").html("");
            $("#info").html(replay);
          }
        });

      });


    </script>

	</body>
</html>
