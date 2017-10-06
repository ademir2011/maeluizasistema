@extends('dashboard.index')

@section('content')

  @include('dashboard.maps.header')

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

      <table class="bordered responsive-table centered">
        <thead>
          <tr>
              <th>ID</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Alterar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>5.5252552</td>
            <td>-35.55555555</td>
            <td><a class="waves-effect waves-light btn">Alterar</a></td>
            <td><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>5.5252552</td>
            <td>-35.55555555</td>
            <td class="center"><a class="waves-effect waves-light btn">Alterar</a></td>
            <td class="center"><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
        </tbody>
      </table>

      </div>

    </div>

  </div>


@endsection
