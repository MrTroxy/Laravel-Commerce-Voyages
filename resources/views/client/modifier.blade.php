@extends('./client/template')
@section('titre')
   YvanDesVoyages-Compte
@endsection
@section('contenu')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="/client/modifier">
            @csrf
                <div class="card shadow" style="margin-bottom: 15px">
                    <div class="car-header bg-success pt-2">
                        <div class="card-title font-weight-bold text-white text-center"> Informations du Compte </div>
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
                            <div class="d-flex flex-row">
                                <div class="w-50 p-1">
                                    <label for="prenom"> Prénom </label>
                                    {!! $errors->first('prenom', '<small class="text-danger">:message</small>') !!}
                                    <input type="text" name="prenom" id="prenom" class="form-control" placeholder="" value="{{ $unClient->prenom }}"/>
                                </div>

                                <div class="w-50 p-1">
                                    <label for="nom"> Nom </label>
                                    {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
                                    <input type="text" name="nom" id="nom" class="form-control" placeholder="" value="{{ $unClient->nom }}"/>
                                </div>
                            </div> <br>

                            <div class="d-flex flex-row">
                                <div class="w-50 p-1">
                                    <label for="courriel"> Courriel </label>
                                    {!! $errors->first('courriel', '<small class="text-danger">:message</small>') !!}
                                    <input type="text" name="courriel" id="email" class="form-control" placeholder="" value="{{ $unClient->courriel }}" readonly/>
                                </div>

                                <div class="w-50 p-1">
                                    <label for="telephone"> Téléphone </label>
                                    {!! $errors->first('telephone', '<small class="text-danger">:message</small>') !!}
                                    <input type="text" name="telephone" id="telephone" class="form-control" placeholder="" value="{{ $unClient->telephone }}"/>
                                </div>
                            </div> <br>
                            
                            <label for="adresse"> Adresse </label>
                            {!! $errors->first('adresse', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="adresse" id="adresse" class="form-control" placeholder="" value="{{ $unClient->adresse }}"/>

                            <label for="ville"> Ville </label>
                            {!! $errors->first('ville', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="ville" id="ville" class="form-control" placeholder="" value="{{ $unClient->ville }}"/>

                            <label for="codePostal"> Code Postal </label>
                            {!! $errors->first('codePostal', '<small class="text-danger">:message</small>') !!}
                            <input type="text" name="codePostal" id="codePostal" class="form-control" placeholder="" value="{{ $unClient->CP }}"/>

                            <label for="province"> Province </label>
                            {!! $errors->first('province', '<small class="text-danger">:message</small>') !!}
                            <select name="province" id="province" class="form-control" placeholder="" value="{{ old('province') }}">
                                @foreach($lesProvinces as $uneProvince)
                                    @if($uneProvince->id == $unClient->province_id)
                                        <option value="{{ $uneProvince->id }}" selected>{{ $uneProvince->province }}</option>
                                    @else
                                        <option value="{{ $uneProvince->id }}">{{ $uneProvince->province }}</option>
                                    @endif
                                @endforeach
                            </select> <br>

                            <label for="genre"> Genre </label>
                            {!! $errors->first('genre', '<small class="text-danger">:message</small>') !!}
                            <select name="genre" id="genre" class="form-control" placeholder="" value="{{ $unClient->genre }}">
                                    <option value="{{$unClient->genre}}" selected>{{$unClient->genre}}</option>
                                    @if($unClient->genre == "M")
                                        <option value="F">F</option>
                                        <option value="A">A</option>
                                    @endif
                            </select> <br>


                            <label for="premierContact"> De qu'elle façon nous avez vous découvert? </label>
                            {!! $errors->first('premierContact', '<small class="text-danger">:message</small>') !!}
                            <select name="premierContact" id="premierContact" class="form-control" placeholder="" value="{{ old('premierContact') }}">
                                @foreach($lesPremiersContact as $unPremierContact)
                                    @if($unPremierContact->id == $unClient->premierContact_id)
                                        <option value="{{ $unPremierContact->id }}" selected>{{ $unPremierContact->premierContact }}</option>
                                    @else
                                        <option value="{{ $unPremierContact->id }}">{{ $unPremierContact->premierContact }}</option>
                                    @endif
                                @endforeach
                            </select>



        <!-- Afficher les premiers contacts de la table premiercontact -->


        
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success"> Enregistrer les changements </button>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection