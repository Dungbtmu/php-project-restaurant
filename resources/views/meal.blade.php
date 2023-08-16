<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    @foreach ($meals as $meal)
    <div class="section">
        <div class="title">
            <h2 class="meal-name">{{ $meal->meal_name }}</h2>
        </div>
        <div class="items">
            @foreach ($meal->galleryItems as $item)
            <div class="item">
                <h2>{{ $item->item }}</h2>
                <p>Price: {{ $item->price }}</p>
                <p>Description: {{ $item->description }}</p>
                <img src="{{ $item->path }}" alt="{{ $item->item }}">
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
    @endsection

</body>

</html>