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
      
    </style>
  </head>
  <body>
    <input type="hidden" id="place" value="<?= $_GET['place']; ?>">
    
    <div id="map"></div>
    
    
     <script type="text/javascript">
     
      var msc_map;
      var place = $("#place").val();
      
      ymaps.ready(function(){
        
        msc_map = new ymaps.Map("map", {center: [55.76, 37.64], zoom: 10, behaviors: ['default', 'scrollZoom']});
        msc_map.controls.add("zoomControl");
        msc_map.controls.add("mapTools");
        
         var geoPlace = ymaps.geocode(place);
          geoPlace.then(
            function (res){
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