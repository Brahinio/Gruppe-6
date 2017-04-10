<?php
session_start();
$_SESSION['places'] = $_POST['places'];
$_SESSION['locationtype'] = $_POST['locationtype'];

?>
<div style="overflow: hidden;">
    
<div style="width:200px; float:left; margin:auto;">
    <form method="post" id="formpost" action="Kart.php">
        <input type="text" name="places" id="textbox" autocomplete="off" placeholder='Områder for søket...'>
        <div id="checkboxhide">
        <br><br>
        <input type="checkbox" name="locationtype[]" value="matbutikk" id="matbutikk"><label for="matbutikk"><span><span></span></span>Matbutikker</label><br>
        <input type="checkbox" name="locationtype[]" value="restaurant" id="restaurant"><label for="restaurant"><span><span></span></span>Resaurant</label><br>
        <input type="checkbox" name="locationtype[]" value="aktivitet" id="aktivitet"><label for="aktivitet"><span><span></span></span>Aktivitet</label><br>
        <input type="checkbox" name="locationtype[]" value="treningssenter" id="treningsenter"><label for="treningsenter"><span><span></span></span>Treningsenter</label><br>
        <input type="checkbox" name="locationtype[]" value="skole" id="skole"><label for="skole"><span><span></span></span>Skole</label><br>
        <input type="checkbox" name="locationtype[]" value="buss" id="buss"><label for="buss"><span><span></span></span>Buss</label><br>
        <input type="submit" id="submit" name="submit" value="Submit">
        </div>
    </form> 
    
    <button id="clicktoshow">Add Location</button>
    <button id="clicktohide">Go back</button>

        <form method="post" id="formadd">
      <input type='text' name='name' id='name' class='dataadd' placeholder='Stedsnavn' autocomplete="off"/>
      <input type='text' name='area' id='area' class='dataadd' placeholder='Område' autocomplete="off"/> 
        <input type='text' name='city' id='city' class='dataadd' placeholder='By' autocomplete="off"/> 
        <input type='text' name='lat' id='lat' class='dataadd' readonly="readonly" placeholder='Latitude' autocomplete="off"/>    
        <input type='text' name='lng' id='lng' class='dataadd'  placeholder='Longitude' autocomplete="off"/> 
          <select id='type' name="type"> 
                <option disabled selected>Velg en type</option>
                 <option value='matbutikk' id='mat'>Matbutikk</option>
                 <option value='restaurant' id='res'>Restaurant</option>
                 <option value='aktivitet' id='akt'>Aktivitet</option>
                 <option value='treningsenter' id='tre'>Treningsenter</option>
                 <option value='skole' id='skl'>Skole</option>
                 <option value='buss' id='bus'>Buss</option>
                 </select>
            <textarea name="description" id="description" form="formadd" rows="4" placeholder="beskrivelse..."></textarea>
                 <input type='submit' value='Save' id='save'/>
        </form>
</div>

    <div id="map" style="width:800px;height:500px; float: left; margin auto;"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX_U9LDG8qS-1G7DJbR0rEq8Y68OTYf9M&callback=initMap"
    type="text/javascript"></script>
        <script>
            

    $("#clicktoshow").hide();
    $("#formadd").hide();
    $( "#clicktohide" ).hide();
    document.getElementById("clicktoshow").addEventListener("click", function(){
        $( "#formadd" ).show();
        $( "#checkboxhide").hide();
        $( "#clicktoshow").hide();
        $( "#clicktohide").show();
    });
    document.getElementById("clicktohide").addEventListener("click", function(){
        $( "#formadd" ).hide();
        $( "#checkboxhide").show();
        $( "#clicktoshow").hide();
        $( "#clicktohide").hide();
    });

    var map;
      var mark;
      var infowindow;
      var messagewindow;
        var markerinfo;
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(59.911491, 10.757933),
        disableDoubleClickZoom: true, 
          zoom: 14
        });
            
        map.setOptions({styles: [
          {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
          {
            featureType: 'administrative',
            elementType: 'geometry.stroke',
            stylers: [{color: '#c9b2a6'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'geometry.stroke',
            stylers: [{color: '#dcd2be'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#ae9e90'}]
          },
          {
            featureType: 'landscape.natural',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#93817c'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#447530'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#f5f1e6'}]
          },
          {
            featureType: 'road.arterial',
            elementType: 'geometry',
            stylers: [{color: '#fdfcf8'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#f8c967'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#e9bc62'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry',
            stylers: [{color: '#e98d58'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry.stroke',
            stylers: [{color: '#db8555'}]
          },
          {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#806b63'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.fill',
            stylers: [{color: '#8f7d77'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#ebe3cd'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry.fill',
            stylers: [{color: '#b9d3c2'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#92998d'}]
          }
        ]
});
        var bounds  = new google.maps.LatLngBounds();
        markerinfo = new google.maps.InfoWindow();
        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });
            
            var showbutton = false;
            
            var gobackreset = document.getElementById('clicktohide');
            gobackreset.onclick = function () { 
                showbutton = false; 
            };
            
        google.maps.event.addDomListener(map, 'click', function(e) {
            if(  $("#clicktoshow").is(":hidden") && showbutton == false){  
                 $("#clicktoshow").show();
                showbutton = true;
            }else if($("#clicktoshow").is(":hidden") && showbutton == true){
                $("#clicktoshow").hide();
            }
            $("#lat").val(e.latLng.lat());
            $("#lng").val(e.latLng.lng());
        });
            
            downloadUrl('phpxml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
              var description = markerElem.getAttribute('description');
                
                
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = description
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label,
                animation: google.maps.Animation.DROP
              });
                
                google.maps.event.addListener(marker, 'click', function() {
            if(!marker.open){
                markerinfo.setContent(infowincontent);
                markerinfo.open(map, marker);
                marker.open = true;
            }
            else{
                markerinfo.close();
                marker.open = false;
            }
            google.maps.event.addListener(map, 'click', function() {
                markerinfo.close();
                marker.open = false;
            });
        });
                
                bounds.extend(point);
            });
                map.fitBounds(bounds);
                });
                            var zoomonce = true;
                google.maps.event.addListener(map, 'zoom_changed', function() {
                zoomChangeBoundsListener = google.maps.event.addListener(map, 'bounds_changed', function(event) {
                    if (this.getZoom() > 15 && zoomonce == true){
                        this.setZoom(15);
                        zoomonce = false;
                    }

                    google.maps.event.removeListener(zoomChangeBoundsListener);
                });
            });
      }

        $("#formadd").on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'adddata.php',
            data: $('#formadd').serialize()
          });
            
            this.reset();

        });
            
        function placeMarker(position, map) {
    var marker = new google.maps.Marker({
        position: position,
        map: map
    });
    map.panTo(position);
}
  
            
        function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

    function doNothing() {}
            
    var customLabel = {
        restaurant: {
          label: 'R'
        },
        matbutikk: {
          label: 'M'
        },
        aktivitet: {
          label: 'A'
        },
        treningsenter: {
          label: 'T'
        },
        skole: {
          label: 'S'
        },
        buss: {
          label: 'B'
        }
      };
    </script>
</div>