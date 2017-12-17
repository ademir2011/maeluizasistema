@extends('dashboard.index')

@section('content')

  @include('dashboard.news.header')

  <div class="row">
    <div class="col s12 m8 offset-m2 l8 offset-l2">
      <div class="card-panel red lighten-1 center">
        <span class="white-text">Será aceito apenas imagem no formato <strong>JPG</strong> !</span>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

        <form method="POST" enctype="multipart/form-data" action="{{ url('news/' . $news->id)}}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="row">
            <div class="col s12 m12 l12">
              <img class="responsive-img" src=" {{ asset($news->caminho) }} " />
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12 m12 l12">
              <div class="file-field input-field">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="text" type="text" class="validate" name="text" value="{{ $news->texto }}"/>
             <label for="text">Texto</label>
           </div>
          </div>

          <input type="submit" class="waves-effect waves-light btn-large" value="Cadastrar" />

        </form>

      </div>

    </div>

  </div>

@endsection
