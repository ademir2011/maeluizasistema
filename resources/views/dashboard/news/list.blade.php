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
              <tr>
                <td>2</td>
                <td>
                  <img class="reponsive-img" width="200" height="200" src="http://s2.glbimg.com/SSBY7ytm--wurCD0qzLjtk7VFTs=/1200x630/s.glbimg.com/jo/g1/f/original/2015/04/02/ja1_2-4_muro_caido.jpg" />
                </td>
                <td>Muro desaba na rua alfa, 88. Cuidado ao passar pelo local</td>

                <form method="GET" action="{{ url('news/' . 2 . '/edit') }}" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <td><button class="waves-effect waves-light btn" type="submit">Alterar</button></td>
                </form>

                <form method="POST" action="{{ url('news/' . 2) }} ">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <td><button class="waves-effect waves-light btn" type="submit" >Excluir</button></td>
                </form>

              </tr>
          </tbody>
        </table>

      </div>

    </div>

  </div>


@endsection
