@extends('./admin/template')
@section('titre')
   YvanDesVoyages-Inscription
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/admin/client/inscrire">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Ajout d'un compte </div>
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

                            <label for="courriel"> Entrez le courriel </label>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="courriel" id="email" class="form-control" placeholder="" value="{{ old('courriel') }}"/>

                            <label for="prenom"> Entrez le prénom </label>
                            {!! $errors->first('prenom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="" value="{{ old('prenom') }}"/>

                            <label for="nom"> Entrez le nom </label>
                            {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="" value="{{ old('nom') }}"/>

                            <label for="adresse"> Entrez l'adresse </label>
                            {!! $errors->first('adresse', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="" value="{{ old('adresse') }}"/>

                            <label for="ville"> Entrez la ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{ old('ville') }}"/>

                            <label for="codePostal"> Entrez le code postal </label>
                            {!! $errors->first('codePostal', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="codePostal" id="codePostal" class="form-control" placeholder="" value="{{ old('codePostal') }}"/>

                            <label for="telephone"> Entrez le téléphone </label>
                            {!! $errors->first('telephone', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="telephone" id="telephone" class="form-control" placeholder="" value="{{ old('telephone') }}"/>

                            <label for="genre"> Choisir le genre </label>
                            {!! $errors->first('genre', '<small class="text-danger">:message</small>') !!}
                            <select name="genre" id="genre" class="form-control" placeholder="" value="{{ old('genre') }}">
                                <option>M</option>
                                <option>F</option>
                                <option>A</option>
                            </select>

                            <label for="province"> Choisir la province </label>
                            {!! $errors->first('province', '<small class="text-danger">:message</small>') !!}
                            <select name="province" id="province" class="form-control" placeholder="" value="{{ old('province') }}">
                                @foreach($lesProvinces as $uneProvince)
                                    <option value="{{ $uneProvince->id }}">{{ $uneProvince->province }}</option>
                                @endforeach
                            </select>

                            <label for="premierContact"> De qu'elle façon il vous as découvert? </label>
                            {!! $errors->first('premierContact', '<small class="text-danger">:message</small>') !!}
                            <select name="premierContact" id="premierContact" class="form-control" placeholder="" value="{{ old('premierContact') }}">
                                @foreach($lesPremiersContact as $unPremierContact)
                                    <option value="{{ $unPremierContact->id }}">{{ $unPremierContact->premierContact }}</option>
                                @endforeach
                            </select>

                            <label for="admin"> Est-ce que le compte sera un admin? </label>
                            {!! $errors->first('admin', '<small class="text-danger">:message</small>') !!}
                            <select name="admin" id="admin" class="form-control" placeholder="" value="{{ old('admin') }}">
                                <option value="0">Non</option>
                                <option value="1">Oui</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> Ajouter le client </button>
                        <a href="{{ route('admin.client.lister') }}" class="btn btn-danger text-white"> Annuler </a>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection