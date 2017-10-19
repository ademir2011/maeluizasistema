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
          @foreach ($phones as $key)
            <tr>
              <td>{{ $key->id }}</td>
              <td>{{ $key->local_name }}</td>
              <td>{{ $key->phone }}</td>
              <td><a class="waves-effect waves-light btn">Alterar</a></td>
              <td><a class="waves-effect waves-light btn">Excluir</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>

      </div>

    </div>

  </div>

@endsection
