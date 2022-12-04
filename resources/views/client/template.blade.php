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
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all'/>
      <link rel='stylesheet' href='{{ asset('css/easy-responsive-shortcodes.css') }}' type='text/css' media='all'/>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
      <a style="margin-left:90%" class="nav-link" href="{{route('deconnecter')}}"> Déconnexion </a>
      <a style="margin-left:90%" class="nav-link" href="{{route('client.modifierCompte')}}"> Profil </a>
      <a style="margin-left:90%" class="nav-link" href="{{route('panier.historique')}}"> Historique d'achats </a>
      @endif
      @if(!session()->exists('courriel'))
      <a style="margin-left:90%" class="nav-link" href="{{route('connecter')}}"> Connexion </a>
      @endif

      <div class="site-branding">
        <h1 class="site-title"><a href="" rel="home">YvanDesVoyages</a></h1>
        <h2 class="site-description">Le meilleur site de vente de voyages</h2>
      </div>
      <nav id="site-navigation" class="main-navigation">
        <button class="menu-toggle">Menu</button>
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
      <div class="menu-menu-1-container">
        <ul id="menu-menu-1" class="menu">
          <li><a href="{{route('voyage.afficher')}}">Magasiner les voyages</a></li>
          <li><a href="{{route('voyage.apropos')}}">À propos</a></li>
          <li><a href="{{route('panier.afficher')}}">Panier</a></li>
        </ul>
      </div>
      </nav>

      </header>
    @yield('contenu')
	<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="site-info">
			<h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 46px;">YvanDesVoyages</h1>
			<a target="blank" href="">&copy; Copyrigth (tu copies...j'te poursuis...t'es cuits!)</a>
		</div>
	</div>
	</footer>
	<a href="#top" class="smoothup" title="Back to top"><img style="width: 30px" src="arrow-up-circle.svg"></span></a>
</div>
<!-- #page -->
<script src='{{ asset('js/jquery.js') }}'></script>
<script src='{{ asset('js/plugins.js') }}'></script>
<script src='{{ asset('js/scripts.js') }}'></script>
<script src='{{ asset('js/masonry.pkgd.min.js') }}'></script>
    </body>
</html>