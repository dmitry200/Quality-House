<!DOCTYPE html>
<html>
  <head>
    <title>Гео</title>
    <meta charset="utf-8">
    <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"> </script>
    <script src="js/jquery.js"></script>
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
    <a href="index.php">Назад</a>
    <input type="hidden" id="place" value="<?= $_GET['place']; ?>">
    <div id="map"></div>
    
    <script type="text/javascript">
     
      var msc_map;
      var place = $("#place").val();
      
      ymaps.ready(function(){
        
        var geoPlace = ymaps.geocode(place);
        geoPlace.then(
          function (res){
            msc_map = new ymaps.Map("map", {center: res.geoObjects.get(0).geometry.getCoordinates(), zoom: 15, behaviors: ['default', 'scrollZoom']});
            msc_map.controls.add("zoomControl");
            msc_map.controls.add("mapTools");
            msc_map.geoObjects.add(res.geoObjects.get(0));
          },
          function (err) {
            alert('Error');
          }
        );

        
        
        
      });
      
    </script>
  </body>
</html>