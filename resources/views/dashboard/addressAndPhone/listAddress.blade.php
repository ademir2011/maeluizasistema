@extends('dashboard.index')

@section('content')

  @include('dashboard.addressAndPhone.header')

  @include('dashboard.addressAndPhone.header_sub_menu')

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

      <table class="bordered responsive-table centered">
        <thead>
          <tr>
              <th>ID</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Tipo</th>
              <th>Nome do local</th>
              <th>CEP</th>
              <th>Endereço</th>
              <th>Alterar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>5.5252552</td>
            <td>-35.55555555</td>
            <td>Abrigo público</td>
            <td>Igreja Missão</td>
            <td>59599-999</td>
            <td>Rua dos alfaiates, 812</td>
            <td><a class="waves-effect waves-light btn">Alterar</a></td>
            <td><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>15.5252552</td>
            <td>-25.55555555</td>
            <td>Abrigo público</td>
            <td>Igreja Missão 2</td>
            <td>59599-999</td>
            <td>Rua dos alfaiates, 812</td>
            <td><a class="waves-effect waves-light btn">Alterar</a></td>
            <td><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
        </tbody>
      </table>

      </div>

    </div>

  </div>

@endsection
