@extends('dashboard.index')

@section('content')

  @include('dashboard.news.header')

  <div class="row">

    <div class="col s12 m12 l12 center" style="margin-top:25px;">

      <div class="card-panel white">

        <table class="bordered responsive-table centered">
          <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Texto</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($news as $key)
              <tr>
                <td>{{ $key->id }}</td>
                <td>
                  <img class="responsive-img" width="300" height="300" src="{{ asset($key->caminho) }} " />
                </td>
                <td>{{ $key->texto }}</td>

                <form method="GET" action="{{ url('news/' . $key->id . '/edit') }}" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <td><button class="waves-effect waves-light btn" type="submit">Alterar</button></td>
                </form>

                <form method="POST" action="{{ url('news/' . $key->id) }} ">
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
