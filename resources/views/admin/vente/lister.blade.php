@extends('./admin/template')
@section('titre')
   Administration - Ventes
@endsection
@section('contenu')
<div class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main">
				
				<article class="hentry">
				<header class="entry-header">
				<h1 class="entry-title text-center">Liste de Ventes</h1>	
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
                <h2>Ventes en attente de paiements</h2>
                <table class="table table-striped display">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Voyage</th>
                            <th scope="col">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toutesLesVentes as $uneVente)
                        @if($uneVente->unPaiement->count() == 0)
                            <tr>
                                <td>{{ $uneVente->dateVente }}</td>
                                <td>{{ $uneVente->unClient->prenom }} {{ $uneVente->unClient->nom }}</td>
                                <td><a href="/voyage/detailler/{{ $uneVente->unVoyage->id }}">{{$uneVente->unVoyage->nomVoyage}}</a></td>
                                <td>{{ $uneVente->quantiteVoyageurs }}</td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <h2>Ventes qui ne sont pas fini d'être payés</h2>
                <table class="table table-striped display">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Voyage</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Montant payé</th>
                            <th scope="col">Montant total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toutesLesVentes as $uneVente)
                        @if($uneVente->unPaiement->count() > 0)
                            @if($uneVente->unPaiement->sum('montantPaiement') < round(((($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs) * (0.14975)) + ($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs)), 2))
                                <tr>
                                    <td>{{ $uneVente->dateVente }}</td>
                                    <td>{{ $uneVente->unClient->prenom }} {{ $uneVente->unClient->nom }}</td>
                                    <td><a href="/voyage/detailler/{{ $uneVente->unVoyage->id }}">{{$uneVente->unVoyage->nomVoyage}}</a></td>
                                    <td>{{ $uneVente->quantiteVoyageurs }}</td>
                                    <td>{{ round($uneVente->unPaiement->sum('montantPaiement'), 2) }}$</td>
                                    <td>{{ round(((($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs) * (0.14975)) + ($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs)), 2) }}$</td>
                                </tr>
                            @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <h2>Ventes qui ont été payés en totalité</h2>
                <table class="table table-striped display">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Voyage</th>
                            <th scope="col">Participants</th>
                            <th scope="col">Montant payé</th>
                            <th scope="col">Montant total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toutesLesVentes as $uneVente)
                        @if($uneVente->unPaiement->count() > 0)
                            @if($uneVente->unPaiement->sum('montantPaiement') >= round(((($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs) * (0.14975)) + ($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs)), 2))
                                <tr>
                                    <td>{{ $uneVente->dateVente }}</td>
                                    <td>{{ $uneVente->unClient->prenom }} {{ $uneVente->unClient->nom }}</td>
                                    <td><a href="/voyage/detailler/{{ $uneVente->unVoyage->id }}">{{$uneVente->unVoyage->nomVoyage}}</a></td>
                                    <td>{{ $uneVente->quantiteVoyageurs }}</td>
                                    <td>{{ $uneVente->unPaiement->sum('montantPaiement') }}$</td>
                                    <td>{{ round(((($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs) * (0.14975)) + ($uneVente->unVoyage->prix * $uneVente->quantiteVoyageurs)), 2) }}$</td>
                                </tr>
                            @endif
                        @endif
                        @endforeach
                    </tbody>

				</div><!-- .entry-content -->
				</article>
				
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
