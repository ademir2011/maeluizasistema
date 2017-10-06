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
             <li><a href="mobile.html">Sair</a></li>
           </ul>
           <ul class="side-nav" id="mobile-demo">
             <li><a href="mobile.html">Sair</a></li>
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
                      <img src="images/office.jpg">
                    </div>
                    <a href="#!user"><img class="circle" src="https://cdn3.iconfinder.com/data/icons/users-6/100/654853-user-men-2-512.png"></a>
                    <a href="#!name"><span class="black-text name">Ademir Bezerra</span></a>
                    <a href="#!email"><span class="black-text email">teste@teste.com</span></a>
                  </div>
                </li>
                <li><div class="divider"></div></li>
                <li><a href="{{ url('/maps') }}" class="waves-effect"><i class="material-icons">location_on</i>Mapas</a></li>
                <li><a href="{{ url('/addressAndPhone') }}" class="waves-effect"><i class="material-icons">dialpad</i>Endereços e Telefones</a></li>
                <li><a href="{{ url('/otherDatas') }}" class="waves-effect"><i class="material-icons">folder</i>Outros dados oficiais</a></li>
              </ul>

            </div>

            <div class="col s12 m12 l12">

              @yield('content')

            </div>

        </div>

      </main>

    </div>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <script>
      $(document).ready(function() {
       $('select').material_select();
      });
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
