@extends('./client/template')
@section('titre')
   Paiement
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
											</div>
										</a>
										<span class="price" style=" margin-left:10px"><span class="amount">Nombre de participants : {{ $unVoyageDuPanier->quantite }}</span>
									</li>
								@endforeach
							@endif
						</div>
						<div>
							<form action="/panier/commande/valider" method="post" style="display:flex; flex-direction:row;">
								@csrf
								<div>
									<label>{{ $unClient->prenom }}</label>
									<label>{{ $unClient->nom }}</label><br>
									<label>{{ $unClient->adresse }}</label><br>
									<label>{{ $unClient->ville }}</label><br>
									<label>{{ $unClient->province->province }}</label> <br>
									<label>{{ $unClient->CP }}</label><br>
									<label style="margin-bottom: 20px;">{{ $unClient->telephone }}</label><br>
									<strong><label>Montant avant-taxes : {{ $lePrixAvantTaxes }} $</label><br>
									<label>TPS : {{ $laTps }} $</label><br>
									<label>TVQ : {{ $laTvq }} $</label><br>
									<label>Montant dû : {{ $lePrixApresTaxes }} $</label></strong>
								</div>
								<div style="margin-left: 30px;">
									<label for="titulaire"> Titulaire de la carte </label>
									<input required type="text" name="titulaire" id="titulaire" value="{{ $unClient->prenom }} {{ $unClient->nom }}" placeholder="{{ $unClient->prenom }} {{ $unClient->nom }}" class="form-control" placeholder="" style="margin-bottom: 10px; width:300px;" />
									<label for="numeroCarte"> Numéro de carte </label>
									<input required type="text" maxlength="16" pattern="[0-9]{13,16}" name="numeroCarte" id="numeroCarte" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" style="margin-bottom: 10px; width:300px;" />
									<label for="ccv"> CCV </label>
									<input required type="text" maxlength="3" pattern="[0-9]{3}" name="ccv" id="ccv" class="form-control" placeholder="" style="margin-bottom: 10px; width:100px;" />
									<label for="dateExpirationMois"> Date d'expiration </label>
									<div style="display: flex; flex-direction:row;">
									<select name="dateExpirationMois" id="dateExpirationMois" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										@for ($i = 1; $i <= 12; $i++)
											@if ($i < 10)
												<option value="0{{ $i }}">0{{ $i }}</option>
											@else
												<option value="{{ $i }}">{{ $i }}</option>
											@endif
										@endfor
									</select>
									/
									<select name="dateExpirationAnnee" id="dateExpirationAnnee" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										@for ($i = 22; $i <= 31; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>
									</div>
									<button type="submit" style="color:black;">Procéder au paiement</button>
								</div>
							</form>
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