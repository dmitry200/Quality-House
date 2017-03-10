<?php
  
  require_once "start.php";
  
  $infs = $INF->getInfsByArea($_GET['area']);
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Гео</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap/bootstrap.css">
    <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>
    <script src="admin/js/jquery.js"></script>
    <script src="admin/js/bootstrap.js"></script>
    <style>
      
      #map{
        width: 100wh;
        height: 100vh;
      }
      
      a { 
        text-align: center;
        padding: 15px;
        font-size: 25px;
      }
      
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row" style="padding: 15px">
        <div class="col-md-8">        
          <div id="map"></div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <a href="index.php" class="btn btn-default">Назад</a>            
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <h2>Инфраструктура</h2>
              <table class="table table-hover">
                <tr>
                  <th style="text-align: center; border: 1px solid black;">Адрес</th>
                </tr>
                <?php
                  
                  for ($i = 0; $i < count($infs); $i++) {
                    echo "<tr><td name='infs'>".$infs[$i]."</td></tr>";
                  }
                  
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" id="place" value="<?= $_GET['place']; ?>">
      
      <script type="text/javascript">
       
        var msc_map;
        var place = $("#place").val();
        var center_coords = [];
        
        var addresses = $("[name='infs']");
        
        ymaps.ready(function(){
          
          msc_map = new ymaps.Map("map", {center: [55.76, 37.64], zoom: 10, behaviors: ['default', 'scrollZoom']});
          msc_map.controls.add("zoomControl");
          msc_map.controls.add("mapTools");
          
          $.each(addresses, function(index, value){
            var geoObject = ymaps.geocode(value.innerText);
            geoObject.then(
              function (res) {
                msc_map.geoObjects.add(res.geoObjects.get(0));
              },
              function (err) {
                alert(err);
              }
            );
          });
          
          var geoPlace = ymaps.geocode(place);
          geoPlace.then(
            function (res){
              center_coords = res.geoObjects.get(0).geometry.getCoordinates();
              msc_map.geoObjects.add(res.geoObjects.get(0));
            },
            function (err) {
              alert('Error');
            }
          );
          
        });
        
      </script>
    
    </div>
  </body>
</html>