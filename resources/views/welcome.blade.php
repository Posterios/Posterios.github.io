<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posterios - Project Exhibition & Forum Discussion</title>
        <link rel="shortcut icon" href="{{ asset('image/icon-logo-white.png') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome/navbar.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    </head>
    <body>


        @if(!Auth::check())

        <div class="header">
            @include('navbar')
            @include('welcome.effectbubble')
            <div class="container-header text-center text-light mt-lg-4">
                <h1 class="mb-4">Project Showcase & Forum Disccusion</h1>
                <p class="mb-4">
                    Posterios is a platform to show off and promote student creations widely. Everyone can learn through a project and build connections with people.
                </p>
                <a href="#" id="getstartbtn" class="btn getstart-btn">How To Start</a>
                <a href="/post" class="btn startpost-btn ml-2">Start Posting</a>
            </div>
        </div>



        @else

        <div class="header">
            @include('navbar')
            <div class="container-header text-center text-light mt-lg-4">
                <h1>Project Exhibiton & Forum Disccusion</h1>
                <p>
                    Posterios is a platform to show off and promote student creations widely. Everyone can learn through a project and build connections with people.
                </p>
            </div>
        </div>

        @endif
    </body>
</html>

