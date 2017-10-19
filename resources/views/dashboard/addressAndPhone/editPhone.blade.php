@extends('dashboard.index')

@section('content')

  @include('dashboard.addressAndPhone.header')

  <style>

      #map {
        height: 400px;
        width: 100%;
      }

  </style>

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

        <form method="POST" action="{{ url('addressAndPhone/' . $phone->id)}}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="typePhone" value="true">
          {!! csrf_field() !!}

          <div class="row">
            <div class="input-field col s12 m6 l6">
              <input name="local_name_phone" id="ifPhoneLocalName" type="text" class="validate" value="{{ $phone->local_name_phone }}"/>
              <label for="ifPhoneLocalName">Nome do estabelecimento</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input name="phone" type="text" id="ifPhone" class="validate" value="{{ $phone->phone }}"/>
              <label for="ifPhone">Telefone</label>
            </div>
          </div>

          <button type="submit" class="waves-effect waves-light btn-large">Alterar</button>

        </form>

      </div>

    </div>

  </div>


<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
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
