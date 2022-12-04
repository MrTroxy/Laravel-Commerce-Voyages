<!doctype html>
<html lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel='stylesheet' href='{{ asset('css/woocommerce-layout.css') }}' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/woocommerce-smallscreen.css') }}' type='text/css' media='only screen and (max-width: 768px)'/>
      <link rel='stylesheet' href='{{ asset('css/woocommerce.css') }}' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/font-awesome.min.css') }}' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/styleAdmin.css') }}' type='text/css' media='all'/>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/easy-responsive-shortcodes.css') }}' type='text/css' media='all'/>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel='stylesheet' href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $ = jQuery.noConflict();
        $(document).ready(function ()
        {
          $('table.display').DataTable();
        });
      </script>
      <title>@yield('titre')</title>
    </head>
    <body>
    @if (session('message'))  
    <div class="alert-danger text-center">  
        <strong>  
        {{ session('message') }}  
        </strong>  
    </div>  
    @endif
    @if ($errors->any())  
    <div class="alert alert-danger">  
        <strong>  
            Oups. Nous n’avons pas pu enregistrer votre demande pour la raison suivante :  
        </strong>  
        <ul class="list-unstyled">
        @foreach ($errors->all() as $error)  
            <li>{{ $error }}</li>  
        @endforeach  
        </ul>  
    </div>  
    @endif  
    <header id="masthead" class="site-header">
      @if(session()->exists('courriel'))
        <a style="margin-left:90%" class="nav-link" href="{{ url('deconnecter') }}"> Déconnexion </a>
      @endif
      @if(!session()->exists('courriel'))
      <a style="margin-left:90%" class="nav-link" href="{{ url('connecter') }}"> Connexion </a>
      @endif
      <div class="site-branding">
        <h1 class="site-title"><a href="index.html" rel="home">YvanDesVoyages</a></h1>
        <h2 class="site-description">Administration du site</h2>
      </div>
      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle">Menu</button>
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
      <div class="menu-menu-1-container">
        <ul id="menu-menu-1" class="menu">
          <li><a href="{{route('admin.client.lister')}}">Gestion des Clients</a></li>
          <li><a href="{{route('admin.voyage.lister')}}">Gestion des Voyages</a></li>
          <li><a href="{{route('admin.vente.lister')}}">Gestion des Ventes</a></li>
        </ul>
      </div>
      </nav>
      </header>
    @yield('contenu')
	<footer>
	
	</footer>
</div>
<!-- #page -->
    </body>
</html>