var geocoder;
var contentString;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var myLatlng = new google.maps.LatLng(0,0);
  var mapOptions = {
    zoom: 2,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
      'sandstone rock formation in the southern part of the '+
      'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
      'south west of the nearest large town, Alice Springs; 450&#160;km '+
      '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
      'features of the Uluru - Kata Tjuta National Park. Uluru is '+
      'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
      'Aboriginal people of the area. It has many springs, waterholes, '+
      'rock caves and ancient paintings. Uluru is listed as a World '+
      'Heritage Site.</p>'+
      '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
      'http://en.wikipedia.org/w/index.php?title=Uluru</a> '+
      '(last visited June 22, 2009).</p>'+
      '</div>'+
      '</div>';

var address = ["London, UK", "New York, USA", "Manila", "Alsace", ""];

codeAddress(map, address);

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

var marker = new google.maps.Marker({
      position: new google.maps.LatLng(-33.890542, 151.274856),
      map: map,
      title: 'Uluru (Ayers Rock)'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

  google.maps.event.addListener(marker, 'click', function() {
    showMessage(marker.getPosition());
  });
}


function codeAddress(map, address) {
  for(var i = 0; i < 10; ++i) {
    geocoder.geocode({'address':address[i]}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      //map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          draggable: false,
          animation: google.maps.Animation.DROP
      });
      var infowindow = new google.maps.InfoWindow({
      content: contentString
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
      });
    } else {
      //alert('Geocode was not successful for the following reason: ' + status);
    }
    });
  }
}

function showMessage(latlang) {
  alert("You selected an answer" + latlang.toString());
}

google.maps.event.addDomListener(window, 'load', initialize);