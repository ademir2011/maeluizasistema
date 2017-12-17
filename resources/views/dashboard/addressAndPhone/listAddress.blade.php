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
              <td>{{ $key->localName }}</td>
              <td>{{ $key->cep }}</td>
              <td>{{ $key->address }}</td>
              <form method="GET" action="{{ url("addressAndPhone/" . $key->id . "/editAddress") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><button class="waves-effect waves-light btn" type="submit">Alterar</button></td>
              </form>
              <form method="POST" action="{{ url("addressAndPhone/" . $key->id . "/deleteAddress") }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><button class="waves-effect waves-light btn" type="submit">Excluir</button></td>
              </form>
            </tr>
          @endforeach
        </tbody>
      </table>

      </div>

    </div>

  </div>

@endsection
