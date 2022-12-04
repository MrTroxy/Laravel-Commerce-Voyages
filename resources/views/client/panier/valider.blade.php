@extends('./client/template')
@section('titre')
   Confirmation de la commande
@endsection
@section('contenu')
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
					<div style="display:flex; flex-direction:row; ">
						<div>
							@if($lesVoyagesDuPanier->count() > 0)
								@foreach ($lesVoyagesDuPanier as $unVoyageDuPanier) 
									<li style="width: 90%; margin-bottom:24px; border:2px black solid;">
										<a href="./voyage/detailler/{{$unVoyageDuPanier->id }}" style="display:flex; flex-direction:row; margin-bottom:10px;">
											<div>
												<img class="productimg" src="{{ $unVoyageDuPanier->imgLink }}" alt="" style="width: 300px">
											</div>
											<div style="margin-left: 25%">
												<h3>{{$unVoyageDuPanier->nomVoyage}}</h3><br>
												<span class="price"><span class="amount">${{ $unVoyageDuPanier->prix }}</span></span><br>
												<span class="price"><span class="amount">${{$lePrixApresTaxes}}</span></span><br>
											</div>
										</a>
										<span class="price" style=" margin-left:10px"><span class="amount">Nombre de participants : {{ $unVoyageDuPanier->quantite }}</span>
									</li>
								@endforeach
							@endif
						</div>
						<div>
							<h2>Paiement passé avec succès!</h2>
						</div>
					</div>
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