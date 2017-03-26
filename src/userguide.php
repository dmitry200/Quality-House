<!DOCTYPE html>
<html>
  <head>
    <title>QH | Видеруководство</title>
    <meta charset="utf-8">
    <style rel="stylesheet" type="text/css">

      * {
        margin: 0px;
        padding: 0px;
      }

      body {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      h1 {
        text-align: center;
      }

      nav {
        display: flex;
        justify-content: space-between;
      }

      nav a {
      	text-decoration: none;
      	border: 1px solid black;
      	padding: 10px;
      	transition-property: all;;
      	transition-duration: 0.3s;
      }

      nav a:hover{
      	background-color: #80C342;
      	color: white;
      	transform: translate(0px, 4px);
      }

    </style>
  </head>
  <body>
    <section>
      <br><br><br>
      <h1>Видеруководство по работе с Quality House</h1>
      <br>
      <nav>
        <a href="index.php">Назад</a>
        <a href="docs/Quality House.html">Обычное руководству</a>
      </nav>
      <br>
      <hr>
      <video width="720" height="480" controls="controls">
        <source src="docs/userguide.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
      </video>
    </section>
  </body>
</html>
