
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>BDSVN</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn-assets.minds.com/front/dist/en/styles.2acb051213c9aaefab7a.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.2/css/dataTables.alphabetSearch.css">
  <script type="text/javascript" src="https://gyrocode.github.io/jquery-datatables-alphabetSearch/1.2.2/js/dataTables.alphabetSearch.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./map.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>


<br><br><br><br>

<div class="w3-sidebar w3-bar-block" style="width:25%"> 
<fieldset id="form">

    <p>

    <input class="checkbox" id="kinh-doanh" name="kinh-doanh" type="checkbox" value="kinh-doanh" />

    <label for="kinh-doanh">Kinh doanh</label>

    </p>

    <p>

    <input class="checkbox" id="cho-thue" name="cho-thue" type="checkbox" value="cho-thue" />

    <label for="cho-thue">Cho thuê</label>

    </p>

    <p>

    <input class="checkbox" id="cong-ty" name="cong-ty" type="checkbox" value="cong-ty" />

    <label for="cong-ty">Công ty</label>

    </p>

    

    <p>

    <input class="checkbox" id="nha-o" name="nha-o" type="checkbox" value="nha-o" />

    <label for="nha-o">Nhà ở</label>

    </p>

    <p>

    <input class="checkbox" id="dau-tu" name="dau-tu" type="checkbox" value="dau-tu" />

    <label for="dau-tu">Đầu tư</label>

    </p>

</fieldset>
</div>
  
  <div style="margin-left:25%">
  <div id="map" style="width: 1000px; height: 500px"></div>
  </div>

<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<script>

  $(window).load(function(){

   var markers = new Array();

    var iconSrc = {};
    
    iconSrc['dau-tu'] = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
    iconSrc['cong-ty'] = 'http://labs.google.com/ridefinder/images/mm_20_green.png';
    iconSrc['cho-thue'] = 'http://labs.google.com/ridefinder/images/mm_20_yellow.png';
    iconSrc['nha-o'] = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
    iconSrc['kinh-doanh'] = 'http://labs.google.com/ridefinder/images/mm_20_gray.png';

    var request = new XMLHttpRequest();
        request.open("GET", "./dataMogi_98.json", false);
        request.send(null)
        var locations = JSON.parse(request.responseText);


    var request = new XMLHttpRequest();
        request.open("GET", "./mapstyle.json", false);
        request.send(null)
        var jsonStyleMap = JSON.parse(request.responseText);

        var HoChiMinh = {lat: 10.7867246, lng: 106.6735853};

        var map = new google.maps.Map(document.getElementById('map'), {
          center: HoChiMinh,
          zoom: 13,
          styles: jsonStyleMap,

        });


    var infowindow = new google.maps.InfoWindow();



    var marker, i;


    // document.write(locations[0].typeBDS);

    for (i = 0; i < locations.length; i++) {  

      marker = new google.maps.Marker({

        position: new google.maps.LatLng(locations[i].lat, locations[i].lng),

        map: map,

        icon: iconSrc[locations[i].typeBDS],

      });
        

      markers.push(marker);

        

      google.maps.event.addListener(marker, 'click', (function(marker, i) {

        return function() {

          infowindow.setContent(locations[i].contentdata);

          infowindow.open(map, marker);

        }

      })(marker, i));

    }

    

    

    



    // == shows all markers of a particular category, and ensures the checkbox is checked ==

      function show(category) {

        for (var i=0; i<locations.length; i++) {

          if (locations[i].typeBDS == category) {

            markers[i].setVisible(true);

          }

        }

      }



      // == hides all markers of a particular category, and ensures the checkbox is cleared ==

      function hide(category) {

        for (var i=0; i<locations.length; i++) {

          if (locations[i].typeBDS == category) {

            markers[i].setVisible(false);

          }

        }

      }

      function toggleBounce(category) {

        for (var i=0; i<locations.length; i++) {

          if (locations[i].special == 0) {

            markers[i].setAnimation(google.maps.Animation.BOUNCE);

          }

        }

      }

      

      // == show or hide the categories initially ==

        hide("dau-tu");

        hide("kinh-doanh");

        hide("nha-o");

        hide("cho-thue");

        hide("cong-ty");







    

        $(".checkbox").click(function(){

            var cat = $(this).attr("value");

        

            // If checked

            if ($(this).is(":checked"))

            {

                show(cat);
                toggleBounce(cat);

            }

            else

            {

                hide(cat);

            }

          });

   

      });//]]>  
    

  
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp0BXpbpC-iPPrEaYxTskw3rKkHKjlZM&libraries=places&callback=initMap"
        async defer></script>



</body>
</html>



