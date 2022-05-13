<!DOCTYPE html>
<html lang="en" class=" @if (request()->get('dark') != null) dark @endif ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','UI')</title>
 
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-100 dark:bg-slate-900">

    <div class="max-w-screen-xl mx-auto"> 
        @yield("content")
    </div>
    
</body>
</html>