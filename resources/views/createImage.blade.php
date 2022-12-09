@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="url" placeholder="url"><br><br>
        <input type="text" name="width" placeholder="width"><br><br>
        <input type="text" name="height" placeholder="height"><br><br>
        <input type="text" name="slug" placeholder="slug"><br><br>
        <select name="collection_id">
            @foreach ($lesCollections as $collection)
                <option value="{{$collection->id}}">{{$collection->name}}</option>
            @endforeach
        </select><br><br>
        <input type="submit" value="Ajouter l'image">
    </form>
@endsection