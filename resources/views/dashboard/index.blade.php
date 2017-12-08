<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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


    <div class="container-fluid">

      <header>
        <nav>
         <div class="nav-wrapper">
           <a href="#!" class="brand-logo">&nbsp&nbsp&nbsp&nbspMãeLuiza</a>
           <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
           <ul class="right hide-on-med-and-down">
             <li><a href="{{ url('/exit') }}">Sair</a></li>
           </ul>
           <ul class="side-nav" id="mobile-demo">
             <li><a href="{{ url('/maps') }}" class="waves-effect"><i class="material-icons">location_on</i>Mapas</a></li>
             <li><a href="{{ url('/addressAndPhone') }}" class="waves-effect"><i class="material-icons">dialpad</i>Endereços e Telefones</a></li>
             <li><a href="{{ url('/news') }}" class="waves-effect"><i class="material-icons">art_track</i>Notícias</a></li>
             <li><a href="{{ url('/conduct') }}" class="waves-effect"><i class="material-icons">thumb_up</i>Conduta</a></li>
             <li><a href="{{ url('/api') }}"><i class="material-icons">folder</i>API</a></li>
             <li class="divider"></li>
             <li><a href="#modal1" class="waves-effect"><i class="material-icons">announcement</i>Alerta</a></li>
             <li class="center"><a href="{{ url('/exit') }}">Sair</a></li>
           </ul>
         </div>
        </nav>
      </header>

      <main>

        <div class="row">

            <div class="col s12 m12 l12">

              <ul id="slide-out" class="side-nav fixed">
                <li>
                  <div class="user-view">
                    <div class="background">
                      <img src="https://i.imgur.com/AMf9X7E.jpg" class="responsive-img">
                    </div>
                    <a href="#!user"><img class="circle" src="https://cdn3.iconfinder.com/data/icons/users-6/100/654853-user-men-2-512.png"></a>
                    <a href="#!name"><span class="black-text name"></span></a>
                    <a href="#!email"><span class="black-text email"></span></a>
                  </div>
                </li>
                <li><a href="{{ url('/maps') }}" class="waves-effect"><i class="material-icons">location_on</i>Mapas</a></li>
                <li><a href="{{ url('/addressAndPhone') }}" class="waves-effect"><i class="material-icons">dialpad</i>Endereços e Telefones</a></li>
                <li><a href="{{ url('/news') }}" class="waves-effect"><i class="material-icons">art_track</i>Notícias</a></li>
                <li><a href="{{ url('/conduct') }}" class="waves-effect"><i class="material-icons">thumb_up</i>Conduta</a></li>
                <li><a href="{{ url('/api') }}"><i class="material-icons">folder</i>API</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#modal1" class="waves-effect red-text modal-trigger"><i class="material-icons">announcement</i>Alerta</a></li>
              </ul>

            </div>

            <div class="col s12 m12 l12">


              @yield('content')

            </div>

        </div>

      </main>

    </div>

    <!-- Modal Structure -->
   <div id="modal1" class="modal">
     <div class="modal-content">
       <h3 class="red-text">Alertar</h3>

       <h6 class="red-text">Tipo de aviso</h6>

       <br/>

       <div class="row">
         <div class="col s12 m2 l2">
           <input type="checkbox" id="test5" />
           <label for="test5">Sonoro</label>
         </div>
         <div class="col s12 m2 l2">
           <input type="checkbox" id="test6" />
           <label for="test6">Visual</label>
         </div>
       </div>

       <div class="row">
         <div class="input-field col s12 m12 l12">
           <input id="textAlert" type="text" class="validate" name="textAlert">
           <label for="textAlert">Texto</label>
         </div>
       </div>

       <div class="row">
         <h6 class="red-text">Enviar aviso via</h6>
       </div>

       <div class="row">
         <div class="col s12 m2 l2">
           <input type="checkbox" id="test7" />
           <label for="test7">SMS (Visual)</label>
         </div>
         <div class="col s12 m2 l2">
           <input type="checkbox" id="test8" />
           <label for="test8">Aplicativo (Sonoro/Visual)</label>
         </div>
       </div>

     </div>

     <div class="modal-footer">
       <div class="col s12 m12 l12 center">
         <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Enviar alerta</a>
       </div>
     </div>
   </div>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script>
      $(document).ready(function() {
       $('select').material_select();
      });
      $('.modal').modal();
      $('.button-collapse').sideNav({
       menuWidth: 300, // Default is 300
       edge: 'left', // Choose the horizontal origin
       closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
       draggable: true, // Choose whether you can drag to open on touch screens,
       onOpen: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is opened
       onClose: function(el) { /* Do Stuff */ }, // A function to be called when sideNav is closed
     }
   );
   </script>

  </body>
</html>
