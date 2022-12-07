@extends('./admin/template')
@section('titre')
   Administration - Voyages
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
				<h1 class="entry-title text-center">Liste de Voyages</h1>	
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
                <a href="{{ route('admin.voyage.creer') }}" class="btn btn-primary text-white">Ajouter un voyage</a> <br><br>
                <table class="table table-striped display">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Date Debut</th>
                            <th scope="col">Duree</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Departement</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tousLesVoyages as $unVoyage)
                            <tr>
                                <td><a href="/voyage/detailler/{{ $unVoyage->id }}">{{$unVoyage->nomVoyage}}</a></td>
                                <td>{{ $unVoyage->dateDebut }}</td>
                                <td>{{ $unVoyage->duree }}</td>
                                <td>{{ $unVoyage->ville }}</td>
                                <td>{{ $unVoyage->prix }}</td>
                                <td>{{ $unVoyage->sonDepartement->nomDepartement }}</td>
                                <td>{{ $unVoyage->saCategorie->categorie }}</td>
                                <td>
                                    <a href="/admin/voyage/detailler/{{ $unVoyage->id }}" class="btn btn-primary text-white">Modifier</a>
                                    <a href="/admin/voyage/supprimer/{{ $unVoyage->id }}" class="btn btn-danger text-white">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
