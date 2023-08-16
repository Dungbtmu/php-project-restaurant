<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    @extends('layout')
    @section('title', 'Trang chủ')
    @section('content')
    <div class="container5">
        <div class="row1">
            <img src="{{ asset('storage/home/home1.jpg') }}" alt="image">
            <div class="bottom-left">
                <h2>THE RESTAURANT</h2>

                <div class="bar">
                    <div class="diamond"></div>
                </div>

                <p>Welcome to the Pré Catelan! Located in the
                    heart of the famous Bois de Boulogne, this
                    treasure of French cuisine received 3 stars in
                    the Michelin Guide.
                </p>
            </div>
        </div>
        <div class="row2">
            <div class="row2-1">
                <img src="{{ asset('storage/home/home2.jpg') }}" alt="image">
            </div>
            <div class="row2-2">
                <h2>WELCOME</h2>

                <div class="bar">
                    <div class="diamond"></div>
                </div>

                <p>
                    Here, interior architect Pierre Yves Rochon has created a
                    stunningly modern concept in touch with its environment,
                    preserving the elegance of the house, “To find yourself in a
                    prodigious place, in the open air, in the peacefulness of the Bois
                    de Boulogne, in Paris, and there to enjoy cuisine by a great
                    chef, all the while savoring the architecture of the building”.
                    Green, black, white and silver are the dominant colors: green, as
                    a nod to the greenery outside, black, white and silver
                    interspersed to mark spaces, enhance details, pilasters and bas-
                    reliefs. The furniture, by turns in harmony or opposition with
                    the architecture of the building, traditional and modern, thus
                    accentuating this impression of purity and lightness.
                </p>
            </div>
        </div>

        <div class="row3">
            <div class="row3-1">
                <h2>HISTORY</h2>

                <div class="bar">
                    <div class="diamond"></div>
                </div>

                <p>
                    Opened in 1856, Le Pré Catelan quickly became a resounding
                    success: the bucolic site, the quality of the orchestras and the
                    refinement of the parties made it one of the most popular
                    places in the capital.
                    Colette and Gaston Lenôtre took over Le Pré Catelan in 1976
                    and turned its reception rooms into one of the citys top venues
                    for events, particularly renowned for its high-end cuisine.
                    Since 2011, Le Pré Catelan has been one of Sodexos Prestige
                    venues and brands.
                </p>
            </div>

            <div class="row3-2">
                <img src="{{ asset('storage/home/home3.jpg') }}" alt="image">
            </div>
        </div>
    </div>
    </div>
    @endsection
</body>

</html>