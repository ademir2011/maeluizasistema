@extends('dashboard.index')

@section('content')

  @include('dashboard.maps.header')

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

        <form method="POST" action="{{ url('/maps')}}">

          {!! csrf_field() !!}

          <div class="row">
            <div class="input-field col s12">
              <input id="latitude" type="text" class="validate">
              <label for="latitude">Latitude</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="longitude" type="text" class="validate">
              <label for="longitude">Longitude</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
             <select>
               <option value="" disabled selected>Escolha a opção correta</option>
               <option value="1">Rotas de fuga</option>
               <option value="2">Pontos de encontro</option>
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


@endsection
