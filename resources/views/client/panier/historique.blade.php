@extends('./client/template')
@section('titre')
   Historique des ACHATS
@endsection
@section('contenu')
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<a href="/historique"><strong>Historique d'achat</strong></a>
				<main id="main" class="site-main" role="main">
				<ul class="products">
					@foreach ($lesVentes as $uneVente) 
						<li style="width: 90%; margin-bottom:24px; border:2px black solid;">
							<a href="../voyage/detailler/{{$uneVente->unVoyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px">
								<div>
									<img class="productimg" src="{{ $uneVente->unVoyage->imgLink }}" alt="" style="width: 300px">
								</div>
								<div style="margin-left: 25%">
									<h3>{{$uneVente->unVoyage->nomVoyage}}</h3><br>
									<span class="price"><span class="amount">Date de l'achat : {{ $uneVente->dateVente }}</span></span><br>
									@if($uneVente->unPaiement)
										@foreach ($uneVente->unPaiement as $unPaiement)
											<span class="price"><span class="amount">Montant payé : ${{ $unPaiement->montantPaiement }}</span></span><br>
										@endforeach
									@else
									    <span class="price"><span class="amount">Montant payé : Inconnu</span></span><br>
									@endif
									<span class="Nombre de participants"><span>{{ $uneVente->quantiteVoyageurs }} participants</span></span><br>
								</div>

							</a>
						</li>
					@endforeach
					@if ($lesVentes->count() == 0)
						<h3 class="text-center">Vous n'avez pas encore acheté de voyages</h3>
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