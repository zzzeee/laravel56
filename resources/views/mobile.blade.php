<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @if( config('app.debug') )
        <script src="http://localhost:8097"></script>
    @endif
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div id="example"></div>

</body>
</html>
