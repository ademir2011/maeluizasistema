@extends('dashboard.index')

@section('content')

  @include('dashboard.maps.header')

  <style>

      #map {
        height: 400px;
        width: 100%;
      }

  </style>

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

        <form method="POST" action="{{ url('/maps')}}">

          {!! csrf_field() !!}

          <div id="map"></div>

          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input id="latitude" type="text" class="validate" placeholder="latitude" >
              <label for="latitude">Latitude</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input id="longitude" type="text" class="validate" placeholder="longitude" >
              <label for="longitude">Longitude</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
             <select>
               <option value="" disabled selected>Escolha a opção correta</option>
               <option value="1">Rota de fuga</option>
               <option value="2">Ponto de encontro</option>
               <option value="3">Área de riscos</option>
               <option value="4">Ponto oficial de coleta de lixo</option>
               <option value="5">Ponto oficiais de descarte de lixo</option>
             </select>
             <label>Materialize Select</label>
           </div>
          </div>

          <input type="submit" class="waves-effect waves-light btn-large" value="Cadastrar" />

        </form>

      </div>

    </div>

  </div>

  <script>

        var map;
        var markers = [];

        function initMap() {

          var latLng = {
            lat: -5.794195,
            lng: -35.187750
          }

          map = new google.maps.Map(document.getElementById('map'), {
            center: latLng,
            zoom: 15
          });

          map.addListener('click', function(e) {

            // map.setCenter(e.latLng.lat());
            latLng.lat = e.latLng.lat();
            latLng.lng = e.latLng.lng();

            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              title: 'Click to zoom'
            });

            markers.push( marker );

            document.getElementById("latitude").value = latLng.lat;
            document.getElementById("longitude").value = latLng.lng;

            if (markers.length == 2) {
              markers[0].setMap(null);
              markers[0] = markers[1];
              markers.pop();
            } else {

            }

            console.log(markers.length);

          });

          //var infoWindow = new google.maps.InfoWindow({map: map});

        }

        function clearMarkers() {
          setMapOnAll(null);
        }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYxlPYEPSRQMsIn-Rm9vzIHVEjYbA4Vxw&callback=initMap"
      async defer></script>

@endsection
