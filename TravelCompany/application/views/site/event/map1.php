<?php
//require "toado.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Place search pagination</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;      
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        right: 5px;
        top: 60%;
        margin-top: -195px;
        height: 330px;
        width: 250px;
        padding: 5px;
        z-index: 5;
        border: 1px solid #999;
        background: #fff;
      }
      h2 {
        font-size: 22px;
        margin: 0 0 5px 0;
      }
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        height: 271px;
        width: 250px;
        overflow-y: scroll;
      }
      li {
        background-color: #f1f1f1;
        padding: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }
      li:nth-child(odd) {
        background-color: #fcfcfc;
      }
      #more {
        width: 100%;
        margin: 5px 0 0 0;
      }
    </style>   
    <script>
      var map;
      function initMap() {
        // Create the map.
        var lat = <?php echo $info->vi_do; ?>;
        var lng = <?php echo $info->kinh_do; ?>;
        var pyrmont = {lat, lng};
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 16
        });
        var marker1 = new google.maps.Marker({
           position:pyrmont,
           animation:google.maps.Animation.BOUNCE
        });
        marker1.setMap(map);

        // Create the places service.
        var service = new google.maps.places.PlacesService(map);
        var getNextPage = null;
        var moreButton = document.getElementById('more');
        moreButton.onclick = function() {
          moreButton.disabled = true;
          if (getNextPage) getNextPage();
        };

        // Perform a nearby search.
        service.nearbySearch(
            {location: pyrmont, radius: 500, type: ['hotel']},
            function(results, status, pagination) {
              if (status !== 'OK') return;

              createMarkers(results);
              moreButton.disabled = !pagination.hasNextPage;
              getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
              };
            });
      }

      function createMarkers(places) {
        var bounds = new google.maps.LatLngBounds();
        var placesList = document.getElementById('places');

        for (var i = 0, place; place = places[i]; i++) {
          var image = {
            url: place.icon,
            size: new google.maps.Size(20, 20),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          var marker = new google.maps.Marker({
            map: map,
            icon: image,
            title: place.name,
            position: place.geometry.location
          });

          var li = document.createElement('li');
          li.textContent = place.name;
          placesList.appendChild(li);

          bounds.extend(place.geometry.location);
        }
        map.fitBounds(bounds);
      }
    </script>
  </head>
  <body>
    <div id="map"></div>   
    <div id="right-panel">
      <!--<form  action="<?php //echo base_url('site/event/view_map'); ?>" method="POST">
        <select name="type">
          <option value="restaurant">Nhà hàng-Quán ăn</option>
          <option value="hotel" selected="selected">Khách sạn</option>
          <option value="cafe">Quán Cafe</option>
        </select>
        <input type="submit">
      </form>-->
      <h2>Results</h2>
      <a href=""><ul id="places"></ul></a>
      <button id="more">More results</button>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQjNUuorBWOGnqKqweloJ3fzIQl7LgpP4&libraries=places&callback=initMap" async defer></script>
  </body>
</html>