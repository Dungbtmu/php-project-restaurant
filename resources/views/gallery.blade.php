<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
</head>

<body>
    @extends('layout')
    @section('title', 'Trang chủ')
    @section('content')
    <h1>Gallery Items</h1>
    <ul class="gallery-list">
        @foreach ($galleryItems as $item)
        <li class="gallery-item">
            <h2>{{ $item->item }}</h2>
            <img src="{{ $item->path }}" alt="{{ $item->item }}" width="200">
            <p>Price: {{ $item->price }}</p>
            <p>Description: {{ $item->description }}</p>
        </li>
        @endforeach
    </ul>
    @endsection
</body>

</html>