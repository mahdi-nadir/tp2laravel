@extends('layouts.app')

@section('content')
    <h1>L'image #{{$image->id}}:</h1>
    <h2><u>L'URL de l'image:</u> <a href="https://dummyimage.com/{{$image->width}}x{{$image->height}}/{{$image->couleurs[0]->codeHexa}}/{{$image->couleurs[1]->codeHexa}}"><i>{{$image->url}}/{{$image->width}}x{{$image->height}}/{{$image->couleurs[0]->codeHexa}}/{{$image->couleurs[1]->codeHexa}}</i></a></h2>
    <h2><u>Slug:</u> <i>{{$image->slug}}</i></h2>
    <h2><u>Date de création:</u> <i>{{$image->created_at ?? 'pas de date'}}</i></h2>
    <h2><u>Mise à jour le:</u> <i>{{$image->updated_at ?? 'pas de date'}}</i></h2>
    <h2><u>Nombre de visites:</u> <i>{{$image->visites->count()}}</i></h2>
    <h2><u>Couleurs de l'image:</u></h2>
    <ul> 
        @foreach ($image->couleurs as $couleur)
            <li><b>#</b>{{$couleur->codeHexa}}</li>
        @endforeach
    </ul>

    <img src="https://dummyimage.com/{{$image->width}}x{{$image->height}}/{{$image->couleurs[0]->codeHexa}}/{{$image->couleurs[1]->codeHexa}}" alt="{{$image->slug}}" style="border: 3px black solid;">
    <br>
    <button><a href="{{route('editImage', $image->id)}}">Editer l'image</a></button>
    <br><br>
    <form action="{{route('destroyImage', $image->id)}}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer l'image">
    </form>
@endsection