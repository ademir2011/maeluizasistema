@extends('dashboard.index')

@section('content')

  @include('dashboard.addressAndPhone.header')

  <div class="row">

    <div class="col s12 m8 offset-m2 l8 offset-l2 center" style="margin-top:25px;">

      <div class="card-panel white">

        <form method="POST" action="{{ url('/addressAndPhone')}}">

          {!! csrf_field() !!}

          <div class="row" onchange="checkOption();">
            <div class="col s12 m6 l6">
              <input name="group1" type="radio" id="test1"/>
              <label for="test1">Endereço</label>
            </div>
            <div class="col s12 m6 l6">
              <input name="group1" type="radio" id="test2"/>
              <label for="test2">Telefone</label>
            </div>
          </div>

          <div style="display: none;" id="formAddress">

            <div class="input-field col s12">
              <select>
                <option value="" disabled selected>Escolha uma opção</option>
                <option value="1">Abrigos públicos</option>
                <option value="2">Posto de Saúde</option>
                <option value="3">Posto de Polícia</option>
              </select>
            </div>

            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input id="ifLocalName" type="text" class="validate"/>
                <label for="ifLocalName">Nome do local</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input id="ifCep" type="text" class="validade" onkeyup="cpf(this)"/>
                <label for="ifCep">CEP</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m12 l12">
                <input id="ifAddress" type="text" class="validate" />
                <label for="ifAddress">Endereço</label>
              </div>
            </div>

          </div>

          <div style="display: none;" id="formPhone">

            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input id="ifPhoneLocalName" type="text" class="validate" />
                <label for="ifPhoneLocalName">Nome do local</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input type="text" id="ifPhone" class="validate" />
                <label for="ifPhone">Telefone</label>
              </div>
            </div>

          </div>

          <input type="submit" class="waves-effect waves-light btn-large" value="Cadastrar" />

        </form>

      </div>

    </div>

  </div>
<script type="text/javascript" src="jquery.maskedinput-1.1.4.pack.js"/></script>
  <script>
    function checkOption() {

      var option1 = document.getElementById("test1").checked;
      var option2 = document.getElementById("test2").checked;

      if ( option1 ) {

        document.getElementById("formAddress").style.display = "";
        document.getElementById("formPhone").style.display = "none";


      } else if ( option2 ) {

        document.getElementById("formAddress").style.display = "none";
        document.getElementById("formPhone").style.display = "";

      }

    }

    function cpf(cpf) {

      cpf = cpf.value;

      if (cpf.length == 8 && cpf.search("-") == -1) {
        document.getElementById("ifCep").value = cpf.substr(0, 5) + "-" + cpf.substr(5, 8);
      } else if ( cpf.length > 8) {
        document.getElementById("ifCep").value = cpf.substring(0, 9);
      }

    }
  </script>


@endsection
