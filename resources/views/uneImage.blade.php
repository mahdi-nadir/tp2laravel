@extends('layouts.app')

@section('content')
    <h1>L'image #{{$image->id}}:</h1>
    <h2>Slug: <i>{{$image->slug}}</i></h2>
    <h2>Date de création: <i>{{$image->created_at ?? 'pas de date'}}</i></h2>
    <h2>Mise à jour le: <i>{{$image->updated_at ?? 'pas de date'}}</i></h2>
    <img src="{{URL::asset("images/{$image->url}.jpg")}}" alt="{{$image->slug}}">
@endsection


{{-- @foreach ($images as $img)
            <li><a href="{{route('slugImage', $img->slug)}}">{{$img->slug}}</a></li>
        @endforeach --}}