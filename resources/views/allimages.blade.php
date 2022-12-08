@extends('layouts.app')

@section('content')
    <h1>Liste de toutes les images</h1>
    <ul>
        @foreach ($images as $img)
            <li><a href="{{route('slugImage', $img->slug)}}">{{$img->slug}}</a></li>
        @endforeach
    </ul>
@endsection