<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>

    <style>
      header, main, footer {
        padding-left: 300px;
      }

      @media only screen and (max-width : 992px) {
        header, main, footer {
          padding-left: 0;
        }
      }
    </style>

      <br />

      <div class="container-fluid">

        <section>

        <div class="row">

          <div class="col s12 m4 offset-m4 l4 offset-l4 center">

            <div class="card-panel">

              <form method="POST" action=" {{ url('/account/authenticate') }} ">

                <input type="hidden" value="{{ csrf_token() }}" name="_token"/>

                <div class="row">
                  <div class="input-field col s12 m12 l12">
                    <input id="user" type="text" class="validate" name="user"/>
                    <label for="user">Usuário</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12 m12 l12">
                    <input id="password" type="password" class="validate" name="password"/>
                    <label for="password">Senha</label>
                  </div>
                </div>

                <input type="submit" class="waves-effect waves-light btn-large" value="Autenticar" />

              </form>

            </div>


          </div>

        </div>

        </section>

      </div>

      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    </body>
</html>
