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

        <form method="POST" action="{{ url('/addressAndPhone')}}">

          {!! csrf_field() !!}

          <div class="row" onchange="checkOption();">
            <div class="col s12 m6 l6">
              <input name="group1" type="radio" id="test1" value="optionAddress"/>
              <label for="test1">Endereço</label>
            </div>
            <div class="col s12 m6 l6">
              <input name="group1" type="radio" id="test2" value="optionPhone"/>
              <label for="test2">Telefone</label>
            </div>
          </div>

          <div style="display: none;" id="formAddress">

            <div id="map"></div>

            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input name="lat" id="latitude" type="text" class="validate" placeholder="latitude" >
                <label for="latitude">Latitude</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input name="lng" id="longitude" type="text" class="validate" placeholder="longitude" >
                <label for="longitude">Longitude</label>
              </div>
            </div>

            <div class="input-field col s12">
              <select name="type">
                <option value="" disabled selected>Escolha uma opção</option>
                <option value="abrigos">Abrigos públicos</option>
                <option value="postos_saude">Posto de Saúde</option>
                <option value="postos_policia">Posto de Polícia</option>
                <option value="outros">Outro local</option>
              </select>
            </div>

            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input name="localNameA" id="ifLocalName" type="text" class="validate"/>
                <label for="ifLocalName">Nome do local</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input name="cep" id="ifCep" type="text" class="validade" onkeyup="cpf(this)"/>
                <label for="ifCep">CEP</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m12 l12">
                <input name="address" id="ifAddress" type="text" class="validate" />
                <label for="ifAddress">Endereço</label>
              </div>
            </div>

          </div>

          <div style="display: none;" id="formPhone">

            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input name="localNameP" id="ifPhoneLocalName" type="text" class="validate" />
                <label for="ifPhoneLocalName">Nome do estabelecimento</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input name="phone" type="text" id="ifPhone" class="validate" />
                <label for="ifPhone">Telefone</label>
              </div>
            </div>

          </div>

          <input type="submit" class="waves-effect waves-light btn-large" value="Cadastrar" />

        </form>

      </div>

    </div>

  </div>


<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
  <script>

    function checkOption() {

      var option1 = document.getElementById("test1").checked;
      var option2 = document.getElementById("test2").checked;

      if ( option1 ) {

        document.getElementById("formAddress").style.display = "";
        document.getElementById("formPhone").style.display = "none";

        google.maps.event.trigger(map, 'resize');
        initMap();


      } else if ( option2 ) {

        document.getElementById("formAddress").style.display = "none";
        document.getElementById("formPhone").style.display = "";

      }

    }

    function cpf(cpf) {

      cpf = cpf.value;

      if (cpf.length == 8 && cpf.search("-") == -1) {
        document.getElementById("ifCep").value = cpf.substr(0, 5) + "-" + cpf.substr(5, 8);
      } else if ( cpf.length > 8) {
        document.getElementById("ifCep").value = cpf.substring(0, 9);
      }

    }

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
