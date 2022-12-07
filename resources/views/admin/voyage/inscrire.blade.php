@extends('./admin/template')
@section('titre')
   YvanDesVoyages-Voyages
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/admin/voyage/inscrire">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Ajout d'un voyage </div>
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

                            <!-- Champ pour le nomVoyage -->
                            <label for="nomVoyage"> Entrez le nom du voyage </label>
                            {!! $errors->first('nomVoyage', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="nomVoyage" id="nomVoyage" class="form-control" placeholder="" value="{{ old('nomVoyage') }}"/>

                            <!-- Champ pour la ville -->
                            <label for="ville"> Entrez la ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{ old('ville') }}"/>

                            <!-- Champ pour la dateDebut -->
                            <label for="dateDebut"> Entrez la date de début </label>
                            {!! $errors->first('dateDebut', '<small class="text-danger">:message</small>') !!}
                            <input type="date" name="dateDebut" id="dateDebut" class="form-control" placeholder="" value="{{ old('dateDebut') }}"/>

                            <!-- Champ pour la duree -->
                            <label for="duree"> Entrez la durée</label><small class="text-success"> (En jours)</small>
                            {!! $errors->first('duree', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="duree" id="duree" class="form-control" placeholder="" value="{{ old('duree') }}"/>

                            <!-- Champ pour le prix -->
                            <label for="prix"> Entrez le prix </label>
                            {!! $errors->first('prix', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="prix" id="prix" class="form-control" placeholder="" value="{{ old('prix') }}"/>

                            <!-- Champ pour le imgLink -->
                            <label for="imgLink"> Entrez le lien de l'image </label>
                            {!! $errors->first('imgLink', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="imgLink" id="imgLink" class="form-control" placeholder="" value="{{ old('imgLink') }}"/>

                            <!-- Champ pour le departement -->
                            <label for="departement"> Choisir le département </label>
                            {!! $errors->first('departement', '<small class="text-danger">:message</small>') !!}
                            <select name="departement" id="departement" class="form-control" placeholder="" value="{{ old('departement') }}">
                                @foreach($lesDepartements as $unDepartement)
                                    <option value="{{ $unDepartement->id }}">{{ $unDepartement->nomDepartement }}</option>
                                @endforeach
                            </select>

                            <!-- Champ pour la categorie -->
                            <label for="categorie"> Choisir la catégorie </label>
                            {!! $errors->first('categorie', '<small class="text-danger">:message</small>') !!}
                            <select name="categorie" id="categorie" class="form-control" placeholder="" value="{{ old('categorie') }}">
                                @foreach($lesCategories as $uneCategorie)
                                    <option value="{{ $uneCategorie->id }}">{{ $uneCategorie->categorie }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> Ajouter le voyage </button>
                        <a href="{{ route('admin.voyage.lister') }}" class="btn btn-danger text-white"> Annuler </a>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection