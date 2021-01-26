<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">

     
    </head>
    <body class="antialiased">
       <div id="app">
        <example-component></example-component>
       </div>
       
       <script src="./js/app.js"></script>
    </body>
</html>
