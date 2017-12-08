@extends('dashboard.index')

@section('content')

  <br>

  <div class="container-fluid">

    <div class="row center">

      <div class="col s12 m3 l3">
        <a href="{{ url('api/maps') }}" class="waves-effect waves-light btn-large" style="display: block;"><i class="material-icons left">location_on</i>API Mapas</a>
      </div>

      <div class="col s12 m3 l3">
        <a href="{{ url('api/address') }}" class="waves-effect waves-light btn-large" style="display: block;"><i class="material-icons left">dialpad</i>API Edereços</a>
      </div>

      <div class="col s12 m3 l3">
        <a href="{{ url('api/phone') }}" class="waves-effect waves-light btn-large" style="display: block;"><i class="material-icons left">dialpad</i>API Telefones</a>
      </div>

      <div class="col s12 m3 l3">
        <a href="{{ url('api/news') }}" class="waves-effect waves-light btn-large" style="display: block;"><i class="material-icons left">art_track</i>API Notícia</a>
      </div>

    </div>

    <div class="row center">

      <div class="col s12 m3 l3">
        <a href="{{ url('api/conduct') }}" class="waves-effect waves-light btn-large" style="display: block;"><i class="material-icons left">thumb_up</i>API Conduta</a>
      </div>

    </div>

  </div>

@endsection
