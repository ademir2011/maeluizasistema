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
              <th>Nome do local</th>
              <th>Telefone</th>
              <th>Alterar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>Polícia militar</td>
            <td>190</td>
            <td><a class="waves-effect waves-light btn">Alterar</a></td>
            <td><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
          <tr>
            <td>1</td>
            <td>Samu</td>
            <td>192</td>
            <td><a class="waves-effect waves-light btn">Alterar</a></td>
            <td><a class="waves-effect waves-light btn">Excluir</a></td>
          </tr>
        </tbody>
      </table>

      </div>

    </div>

  </div>

@endsection
