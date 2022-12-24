@extends('layouts.app')

@section('content')
<h1>Formulaire de création de l'image</h1>

    <form method="post" action="{{ route('storeImage') }}">
        @csrf
        <label for="url"><b>URL:</b></label>
        <input type="text" name="url" value="dummyimage.com" readonly>@error('url') {{$message}} @enderror<br><br>
        <label for="width"><b>Largeur:</b></label>
        <input type="text" name="width" id="width">@error('width') {{$message}} @enderror<br><br>
        <label for="height"><b>Hauteur:</b></label>
        <input type="text" name="height" id="height">@error('height') {{$message}} @enderror<br><br>
        <label for="couleur1"><b>Couleur 1:</b></label>
        <input type="color" name="codeHexa[0]" id="couleur1"><br><br>
        <label for="couleur2"><b>Couleur 2:</b></label>
        <input type="color" name="codeHexa[1]" id="couleur2"><br><br>
        <label for="slug"><b>Slug:</b></label>
        <input type="text" name="slug" placeholder="slug (6 caractères)" id="slug" maxlength="6">@error('slug') {{$message}} @enderror<br><br>
        <label for="collection_id"><b>Choisir la collection:</b></label>
        <select name="collection_id" id="collection_id">
            @foreach ($lesCollections as $collection)
                <option value="{{$collection->id}}">{{$collection->name}}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Ajouter l'image">
    </form>
@endsection