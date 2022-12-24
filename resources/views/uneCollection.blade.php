@extends('layouts.app')

@section('content')
    <h2>Nom de la collection: </h2>{{$laCollection->name}}
    <h2>Le slug de la collection: </h2>{{$laCollection->slug}}
    <h2>Créée le: </h2>{{$laCollection->created_at}}
    <h2>Mise à jour le: </h2>{{$laCollection->updated_at ?? 'Pas encore mis à jour'}}
    <h2>Les images de la collection: </h2>

    @if ($laCollection->images->count() > 0)
        <ul>
            @foreach ($laCollection->images as $item)
                <li><a href="{{route('showImage', $item->slug)}}">{{$item->slug}}</a></li>
            @endforeach
        </ul>
        
        
    <a href="{{ route('slugCollectionJson', $laCollection->slug)}}">Voir toutes les images de cette collection en format JSON</a>
    @else
        Aucune image n'est disponible pour cette collection
    @endif

    <br><br><button><a href="{{ route('createImage') }}">Créer une image</a></button>
@endsection