@extends('./client/template')
@section('titre')
   YvanDesVoyages-Inscription
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/client/inscrire">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Création d'un compte </div>
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

                            <label for="courriel"> Entrez votre courriel </label>
                            {!! $errors->first('courriel', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="courriel" id="email" class="form-control" placeholder="" value="{{ old('courriel') }}"/>

                            <label for="prenom"> Entrez votre prénom </label>
                            {!! $errors->first('prenom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="" value="{{ old('prenom') }}"/>

                            <label for="nom"> Entrez votre nom </label>
                            {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="" value="{{ old('nom') }}"/>

                            <label for="adresse"> Entrez votre adresse </label>
                            {!! $errors->first('adresse', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="" value="{{ old('adresse') }}"/>

                            <label for="ville"> Entrez votre ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{ old('ville') }}"/>

                            <label for="codePostal"> Entrez votre code postal </label>
                            {!! $errors->first('codePostal', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="codePostal" id="codePostal" class="form-control" placeholder="" value="{{ old('codePostal') }}"/>

                            <label for="telephone"> Entrez votre téléphone </label>
                            {!! $errors->first('telephone', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="telephone" id="telephone" class="form-control" placeholder="" value="{{ old('telephone') }}"/>

                            <label for="genre"> Choisir votre genre </label>
                            {!! $errors->first('genre', '<small class="text-danger">:message</small>') !!}
                            <select name="genre" id="genre" class="form-control" placeholder="" value="{{ old('genre') }}">
                                <option>M</option>
                                <option>F</option>
                                <option>A</option>
                            </select>

                            <label for="province"> Choisir votre province </label>
                            {!! $errors->first('province', '<small class="text-danger">:message</small>') !!}
                            <select name="province" id="province" class="form-control" placeholder="" value="{{ old('province') }}">
                                @foreach($lesProvinces as $uneProvince)
                                    <option value="{{ $uneProvince->id }}">{{ $uneProvince->province }}</option>
                                @endforeach
                            </select>

                            <label for="premierContact"> De qu'elle façon nous avez vous découvert? </label>
                            {!! $errors->first('premierContact', '<small class="text-danger">:message</small>') !!}
                            <select name="premierContact" id="premierContact" class="form-control" placeholder="" value="{{ old('premierContact') }}">
                                @foreach($lesPremiersContact as $unPremierContact)
                                    <option value="{{ $unPremierContact->id }}">{{ $unPremierContact->premierContact }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> S'enregistrer </button>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection