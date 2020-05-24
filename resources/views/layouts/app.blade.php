<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name='_token' content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','ForumApp')</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield('content')
    <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
