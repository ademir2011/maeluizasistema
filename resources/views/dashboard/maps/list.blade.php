@extends('dashboard.index')

@section('content')

  @include('dashboard.maps.header')

  <div class="row">

    <div class="col s12 m12 l12 center" style="margin-top:25px;">

      <div class="card-panel white">

        <table class="bordered responsive-table centered">
          <thead>
            <tr>
                <th>ID</th>
                <th>Tipo do marcador</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($maps as $key)
              <tr>
                <td>{{ $key->id }}</td>
                <td>{{ $key->type }}</td>
                <td>{{ $key->lat }}</td>
                <td>{{ $key->lng }}</td>

                <form method="GET" action="{{ url('maps/' . $key->id . '/edit') }}" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <td><button class="waves-effect waves-light btn" type="submit">Alterar</button></td>
                </form>

                <form method="POST" action="{{ url('maps/' . $key->id) }} ">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <td><button class="waves-effect waves-light btn" type="submit" >Excluir</button></td>
                </form>

              </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>

  </div>


@endsection
