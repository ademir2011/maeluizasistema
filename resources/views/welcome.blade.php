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

      <nav class="nav-extended">
        <div class="nav-content green" style="height:250px;background-image:url('http://canindesoares.com/site/wp-content/gallery/aereasrn/IMG_8396.JPG');background-size:cover;background-position:center;">
            <span class="nav-title">&nbsp&nbsp&nbsp&nbspSistema Mãe Luiza</span>
        </div>
        <div class="nav-wrapper green darken-2">
         <ul id="nav-mobile" class="left">
           <li><a href="sass.html">Home</a></li>
           <li><a href="badges.html">Sobre</a></li>
           <li><a href="badges.html">Aplicação</a></li>
           <li><a href="collapsible.html">Contato</a></li>
         </ul>
         <ul class="right">
           <li><a href="{{ url('/account/create') }}">Cadastrar</a></li>
           <li><a href="{{ url('/dashboard') }}">Autenticar</a></li>
         </ul>
        </div>
      </nav>

      <br />

      <div class="container-fluid">

        <section>

        <div class="row">

          <div class="col s12 m8 offset-m2 l8 offset-l2 center">

            <div class="card-panel grey lighten-3">

              Sobre

            </div>

          </div>

          <div class="col s12 m8 offset-m2 l8 offset-l2 center">

            <div class="card-panel grey lighten-3">

              Aplicação

            </div>

          </div>

          <div class="col s12 m8 offset-m2 l8 offset-l2 center">

            <div class="card-panel grey lighten-3">

              Contato

            </div>

          </div>

        </div>

        </section>

      </div>

      <footer class="page-footer">
         <div class="container">
           <div class="row">
             <div class="col l6 s12">
               <h5 class="white-text">Footer Content</h5>
               <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
             </div>
             <div class="col l4 offset-l2 s12">
               <h5 class="white-text">Links</h5>
               <ul>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
               </ul>
             </div>
           </div>
         </div>
         <div class="footer-copyright">
           <div class="container">
           © 2014 Copyright Text
           <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
           </div>
         </div>
       </footer>

       <!--Import jQuery before materialize.js-->
       <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
       <!-- Compiled and minified JavaScript -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    </body>
</html>
