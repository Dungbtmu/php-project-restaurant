<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/award.css') }}">
</head>

<body>
    @extends('layout')
    @section('title', 'Trang chủ')
    @section('content')
    <div class="container2">
        <div class="img">
            <img class="style-img" src="{{ asset('storage/award/aw1.jpg') }}" alt="image">
            <div class="bottom-left">
                <strong>Awards</strong>
            </div>
        </div>

        <div class="row1">
            <div class="row11"><img src="{{ asset('storage/award/aw6.jpg') }}" alt="image"
                    style="height: 600px; width: 100%;"></div>
            <div class="row12">
                <p><STRONG>THE BEST RESTAURANT AWARDS 2022</STRONG> ceremony was a highly
                    anticipated event for food lovers all around the world.
                    Finally, after much deliberation, the winner was announced,
                    leaving audiences excited to try out the newly crowned <STRong> BEST RESTAURANT of 2022.</STRong>
                </p>
            </div>
        </div>
        <div class="row2">
            <div class="row21">
                <p>The moment you step into the Michelin award-winning restaurant.
                    The atmosphere is elegant yet comfortable, and the staff are attentive and knowledgeable.
                    Dining at this Michelin award-winning restaurant is an experience like no other,
                    and it is no wonder that it has earned its place among the best restaurants in the world.
                </p>
            </div>
            <div class="row22">
                <img src="{{ asset('storage/award/aw3.jpg') }}" alt="image" style="height: 600px; width: 100%;">
            </div>
        </div>
        <div class="row3">
            <div class="row31"><img src="{{ asset('storage/award/aw4.jpg') }}" alt="image"
                    style="height: 600px; width: 100%;"></div>
            <div class="row32">
                <p><strong>THANK YOU</strong> for considering our luxury restaurant for the award vote.
                    At our establishment, we strive to provide our guests with an
                    unforgettable experience from start to finish.
                    from the elegant ambiance to the expertly crafted menu items.
                </p>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>