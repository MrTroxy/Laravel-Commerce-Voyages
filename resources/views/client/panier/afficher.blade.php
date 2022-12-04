@extends('./client/template')
@section('titre')
   Gestion du Panier
@endsection
@section('contenu')
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
				<p class="woocommerce-result-count">
					 {{ $nombreDeVoyages }} Voyage dans votre panier
				</p>
				<ul class="products">
					@if($lesVoyagesDuPanier->count() > 0)
					    @foreach ($lesVoyagesDuPanier as $unVoyageDuPanier) 
						    <li style="width: 90%; margin-bottom:24px; border:2px black solid;">
							<a href="../voyage/detailler/{{$unVoyageDuPanier->id}}" style="display:flex; flex-direction:row; margin-bottom:10px">
								<div>
									<img class="productimg" src="{{$unVoyageDuPanier->imgLink}}" alt="" style="width: 300px">
								</div>
								<div style="margin-left: 25%">
									<h3>{{$unVoyageDuPanier->nomVoyage}}</h3><br>
									<span class="price"><span class="amount">{{$unVoyageDuPanier->prix}}$ par participant</span></span><br>
									<span class="price"><span class="amount">Sous-Total : {{$unVoyageDuPanier->prix * $unVoyageDuPanier->quantite}}.00$</span></span><br>
								</div>
							</a>
							<span class="price" style=" margin-left:10px"><span class="amount">Nombre de participants : {{ $unVoyageDuPanier->quantite }}</span>
							<a href="../panier/modifier/quantite/{{$unVoyageDuPanier->id}}/diminuer" type="button" class="btn btn-success text-white" style="width: 30px;">-</a>
							<a href="../panier/modifier/quantite/{{$unVoyageDuPanier->id}}/augmenter" type="button" class="btn btn-success text-white" style="width: 30px;">+</a></span><br>
							<a href="../panier/supprimer/{{$unVoyageDuPanier->id}}" class="button" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Supprimer</a>
							</li>
						@endforeach
						@if ($etat_session)
							<a href="../panier/commande/payer" class="button" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Passer la commande</a>
						@else
							<a href="../connecter" class="button primary" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Veuillez vous connecter pour passer la commande</a>
						@endif
					@endif

				</ul>

				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- #content -->
	</div>
	<!-- .container -->
</div>
@endsection