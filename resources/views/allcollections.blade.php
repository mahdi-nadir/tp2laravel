@extends('layouts.app')

@section('content')
   <h1>Liste des collections</h1>
   @foreach ($lesCollections as $col)
      <div>
         <a href="{{ route('slugCollection', $col->slug) }}">
            {{ $col->name }}
         </a>
      </div>
   @endforeach
@endsection
