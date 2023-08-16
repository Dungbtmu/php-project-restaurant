<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
    <title>Feedback</title>
</head>

<body>
    @extends('layout')
    @section('title', 'Trang chủ')
    @section('content')
    <div class="container">
        <div class="header">
            <div class="header-banner">
                <img src="{{ asset('storage/feedback/feedback.jpg') }}" alt="image">
                <div class="mid-section-img">
                    <strong>
                        <h1>FEEDBACK</h1>
                    </strong>
                </div>
            </div>
            <div class="header-feedback">
                <h2>Leave feedback for Vinegaer</h2>
            </div>
        </div>

        <div class="text-feedback">
            <div class="row-feedback">
                <div class="row-text">
                    <form method="post" action="{{ route('save.feedback') }}">
                        @csrf
                        @method('POST')
                        <div class="info-feedback">
                            <input type="text" name="name" id="name" class="input-field" placeholder="Customer(*)">
                        </div>
                        <div class="info-feedback">
                            <input type="email" name="email" id="email" class="input-field" placeholder="Email(*)">
                            <div class="comments">
                                <span class="recomment">
                                    <textarea name="message" id="message" placeholder="Feedback(*)"
                                        class="message"></textarea>
                                </span>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="Submit" class="btn-feedback">
                    </form>
                </div>
            </div>

            <div class="row-img">
                <img src="https://www.soraesushi.com/wp-content/uploads/2017/01/reservation-683x1024.jpg" alt="">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/feedback.js') }}"></script>
    @endsection
</body>

</html>