@extends('layouts.app')

@section('content')
    <h2>Nom de la collection: </h2>{{$laCollection->name}}
    <h2>le slug de la collection: </h2>{{$laCollection->slug}}
    <h2>Les images de la collection: </h2>

    @if ($laCollection->images->count() > 0)
        <ul>
            @foreach ($laCollection->images as $item)
                <li>{{$item->slug}}</li>
            @endforeach
        </ul>
        
    <a href="{{ route('slugCollectionJson', $laCollection->slug)}}">Voir toutes les images en format JSON</a>
    @else
        Aucune image n'est disponible
    @endif
@endsection