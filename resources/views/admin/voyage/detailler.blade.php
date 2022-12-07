@extends('./admin/template')
@section('titre')
   YvanDesVoyages-Voyages
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/admin/voyage/modifier">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Informations du Voyage </div>
                    </div>

                    <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" placeholder="" value="{{ $unVoyage->id }}"/>

                            <!-- Champ pour le nomVoyage -->
                            <label for="nomVoyage"> Entrez le nom du voyage </label>
                            {!! $errors->first('nomVoyage', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="nomVoyage" id="nomVoyage" class="form-control" placeholder="" value="{{ $unVoyage->nomVoyage }}"/>

                            <!-- Champ pour la ville -->
                            <label for="ville"> Entrez la ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{ $unVoyage->ville }}"/>

                            <!-- Champ pour la dateDebut -->
                            <label for="dateDebut"> Entrez la date de début </label>
                            {!! $errors->first('dateDebut', '<small class="text-danger">:message</small>') !!}
                            <input type="date" name="dateDebut" id="dateDebut" class="form-control" placeholder="" value="{{ $unVoyage->dateDebut }}"/>

                            <!-- Champ pour la duree -->
                            <label for="duree"> Entrez la durée</label><small class="text-success"> (En jours)</small>
                            {!! $errors->first('duree', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="duree" id="duree" class="form-control" placeholder="" value="{{ $unVoyage->duree }}"/>

                            <!-- Champ pour le prix -->
                            <label for="prix"> Entrez le prix </label>
                            {!! $errors->first('prix', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="prix" id="prix" class="form-control" placeholder="" value="{{ $unVoyage->prix }}"/>

                            <!-- Champ pour le imgLink --> <br>
                            <label for="imgLink"> Modifier le lien de l'image actuelle </label> <br>
                            <img src="{{ $unVoyage->imgLink }}" alt="Image du voyage" class="img-fluid" style="margin-bottom: 10px"> <br>
                            {!! $errors->first('imgLink', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="imgLink" id="imgLink" class="form-control" placeholder="" value="{{ $unVoyage->imgLink }}"/>

                            <!-- Champ pour le departement -->
                            <label for="departement"> Choisir le département </label>
                            {!! $errors->first('departement', '<small class="text-danger">:message</small>') !!}
                            <select name="departement" id="departement" class="form-control">
                                <option value="0"> Choisir un département </option>
                                @foreach($lesDepartements as $unDepartement)
                                    <option value="{{ $unDepartement->id }}" {{ $unDepartement->id == $unVoyage->departement_id ? 'selected' : '' }}> {{ $unDepartement->nomDepartement }} </option>
                                @endforeach
                            </select>


                            <!-- Champ pour la categorie -->
                            <label for="categorie"> Choisir la catégorie </label>
                            {!! $errors->first('categorie', '<small class="text-danger">:message</small>') !!}
                            <select name="categorie" id="categorie" class="form-control">
                                <option value="0"> Choisir une catégorie </option>
                                @foreach($lesCategories as $uneCategorie)
                                    <option value="{{ $uneCategorie->id }}" {{ $uneCategorie->id == $unVoyage->categorie_id ? 'selected' : '' }}> {{ $uneCategorie->categorie }} </option>
                                @endforeach
                            </select>



        <!-- Afficher les premiers contacts de la table premiercontact -->


        
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success text-white"> Enregistrer les changements </button>
                        <a href="{{ route('admin.voyage.lister') }}" class="btn btn-danger text-white"> Annuler </a>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection