@extends('./client/template')
@section('titre')
   YvanDesVoyages
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
					 {{ $nombreVoyages }} Voyages disponibles
				</p>
				<ul class="products">
				
					@foreach ($lesVoyages as $unVoyage) 
						<li class="product">
						<a href="./voyage/detailler/{{ $unVoyage->id }}">
						<img class="productimg" src="{{ $unVoyage->imgLink }}" alt="">
						<h3>{{$unVoyage->nomVoyage}}</h3>
						<span class="price"><span class="amount">${{ $unVoyage->prix }}</span></span>
						</a><a href="./panier/ajouter/{{$unVoyage->id}}" class="button">Ajouter au panier</a>
						</li>
					@endforeach
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