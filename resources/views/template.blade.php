<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Envent'ually</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <!--<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>-->
        <style>
            /* Add a black background color to the top navigation */
            .topnav {
                background-color: #333;
                overflow: hidden;
                position: fixed;
                width: 100%;
            }

            /* Style the links inside the navigation bar */
            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            /* Change the color of links on hover */
            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            /* Add a color to the active/current link */
            .topnav a.active {
                background-color: #4CAF50;
                color: white;
            }

            .flex-container {
                min-height: 400px;
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                justify-content: space-around;
                align-items: center;
                align-content: space-around;
            }

            .flex-item {
                width: 500px;
                height: 300px;
                background-color: lightblue;
                flex: 0 0 auto;
                margin: 50px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="{{route('welcome')}}">Home</a>
            <a href="{{route('welcome')}}">Events</a>
            <a href="{{route('signup')}}">Sign up</a>
            <a href="{{route('login')}}">Log in</a>
        </div> 

        @yield('content')
    </body>
</html>
