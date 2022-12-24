@extends('layouts.app')

@section('content')
<h1>Formulaire de modification de l'image</h1>
    <form method="post" action="{{ route('updateImage', ['id' => $image->id]) }}">
        @csrf
        <label for="url"><b>URL:</b></label>
        <input type="text" name="url" value="dummyimage.com" readonly>@error('url') {{$message}} @enderror<br><br>

        <label for="width"><b>Largeur:</b></label>
        <input type="text" name="width" id="width" value={{old('width', $image->width)}}>@error('width') {{$message}} @enderror<br><br>

        <label for="height"><b>Hauteur:</b></label>
        <input type="text" name="height" id="height" value={{old('height', $image->height)}}>@error('height') {{$message}} @enderror<br><br>

        @for ($i = 0; $i < count($image->couleurs); $i++) 
            <label for="couleur{{$i}}"><b>Couleur {{$i+1}}:</b></label>
            <input type="color" name="codeHexa[{{$i}}]" id="couleur{{$i}}" value={{old("codeHexa[$i]", '#'.$image->couleurs[$i]->codeHexa)}}><br><br>
        @endfor

        <label for="slug"><b>Slug:</b></label>
        <input type="text" name="slug" placeholder="slug (6 caractères)" id="slug" maxlength="6" value={{old('slug', $image->slug)}}>@error('slug') {{$message}} @enderror<br><br>

        <label for="collection_id"><b>Choisir la collection:</b></label>
        <select name="collection_id" id="collection_id" value={{old('collection_id', $image->collection->id)}}>
            @foreach ($lesCollections as $col)
                <option value={{$col->id == $image->collection->id ? "$col->id selected" : "$col->id"}}>{{$col->name}}</option>
            @endforeach
        </select> La collection par défaut est <b>"{{$image->collection->name}}"</b><br><br>

        <input type="submit" value="Appliquer la modification de l'image"><br><br>
    </form>

    <details>
        <summary>Ajouter une nouvelle couleur</summary>
        <form action="{{route('addCouleur', $image->id)}}" method="post">
            @csrf
            <label for="couleur"><b>Choisir une couleur:</b></label>
            <input type="color" name="couleur"><br><br>
            <input type="submit" value="Ajouter la couleur">
        </form>
    </details>
@endsection