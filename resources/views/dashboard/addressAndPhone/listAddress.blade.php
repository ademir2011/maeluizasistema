@extends('dashboard.index')

@section('content')

  @include('dashboard.addressAndPhone.header')

  @include('dashboard.addressAndPhone.header_sub_menu')

  <div class="row">

    <div class="col s12 m12 l12 center" style="margin-top:25px;">

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
          @foreach ($addresses as $key)
            <tr>
              <td>{{ $key->id }}</td>
              <td>{{ $key->lat }}</td>
              <td>{{ $key->lng }}</td>
              <td>{{ $key->type }}</td>
              <td>{{ $key->local_name }}</td>
              <td>{{ $key->cep }}</td>
              <td>{{ $key->address }}</td>
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
