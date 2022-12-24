@extends('layouts.app')

@section('content')
    <h1>Liste de toutes les images</h1>
    @if (session('success'))
        <p  x-data="{ show: true }" 
            x-show="show" 
            x-transition
            x-init="setTimeout(() => show = false, 3000)" 
            class="text-sm text-gray-600 dark:text-gray-400">
                {{ session('success') }}
        </p>                                
    @endif
    <ul>
        @foreach ($images as $img)
            <li><a href="{{route('showImage', $img->slug)}}">{{$img->slug}}</a> (<span style="color: red;">{{$img->collection->name}}</span>)</li>
        @endforeach
    </ul>
    <button><a href="{{route('createImage')}}">Créer une nouvelle image</a></button>
@endsection