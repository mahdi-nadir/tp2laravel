@extends('layouts.app')

@section('content')
    <h1>L'image #{{$image->id}}:</h1>
    <h2><u>Slug:</u> <i>{{$image->slug}}</i></h2>
    <h2><u>Date de création:</u> <i>{{$image->created_at ?? 'pas de date'}}</i></h2>
    <h2><u>Mise à jour le:</u> <i>{{$image->updated_at ?? 'pas de date'}}</i></h2>
    <h2><u>Nombre de visites:</u> <i>{{$image->visites->count()}}</i></h2>
    <h2><u>Couleurs de l'image:</u></h2>
    <ul> 
        @foreach ($image->couleurs as $couleur)
            <li>#{{$couleur->codeHexa}}</li>
        @endforeach
    </ul>

    <img src="{{URL::asset("images/{$image->url}.jpg")}}" alt="{{$image->slug}}" width="300px">
    <br>
    <a href="{{-- {{route('modifierImage', $image->id)}} --}}">Editer l'image</a>
    <br>
    <form action="{{-- {{route('supprimerImage', $image->id)}} --}}" method="post">  {{-- a revoir --}}
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer l'image">
    </form>
@endsection