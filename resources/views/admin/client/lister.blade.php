@extends('./admin/template')
@section('titre')
   Administration - Clients
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
				<h1 class="entry-title text-center">Liste de clients</h1>	
				</header>
				<!-- .entry-header -->

				<div class="entry-content">
                <a href="{{ url('admin/client/creerCompte') }}" class="btn btn-success text-white">Ajouter un client</a> <br><br>
                <table class="table table-striped display">
                    <thead>
                        <tr>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Courriel</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Code Postal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tousLesClients as $unClient)
                            <tr>
                                <td>{{ $unClient->prenom }}</td>
                                <td>{{ $unClient->nom }}</td>
                                <td>{{ $unClient->courriel }}</td>
                                <td>{{ $unClient->telephone }}</td>
                                <td>{{ $unClient->ville }}</td>
                                <td>{{ $unClient->CP }}</td>
                                <td>
                                    <a href="/admin/client/detailler/{{ $unClient->id }}" class="btn btn-primary text-white">Modifier</a>
                                    <a href="/admin/client/supprimer/{{ $unClient->id }}" class="btn btn-danger text-white">Supprimer</a>
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
