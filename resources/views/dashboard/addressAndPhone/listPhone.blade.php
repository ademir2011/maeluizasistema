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
              <td>{{ $key->local_name_phone }}</td>
              <td>{{ $key->phone }}</td>
              <form method="GET" action="{{ url("addressAndPhone/" . $key->id . "/editPhone") }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><button type="submit" class="waves-effect waves-light btn">Alterar</button></td>
              </form>
              <form method="POST" action="{{ url("addressAndPhone/" . $key->id . "/deletePhone") }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <td><button type="submit" class="waves-effect waves-light btn">Excluir</button></td>
              </form>
            </tr>
          @endforeach
        </tbody>
      </table>

      </div>

    </div>

  </div>

@endsection
