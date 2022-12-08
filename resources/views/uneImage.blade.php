@extends('layouts.app')

@section('content')
    <h1>L'image #{{$image->id}}:</h1>
    <h2>Slug: <i>{{$image->slug}}</i></h2>
    <h2>Date de création: <i>{{$image->created_at ?? 'pas de date'}}</i></h2>
    <h2>Mise à jour le: <i>{{$image->updated_at ?? 'pas de date'}}</i></h2>
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

