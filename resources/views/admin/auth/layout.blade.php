<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title')</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
 

</head>

<body class="bg-slate-100 dark:bg-slate-900">

    <div class="flex items-center justify-center min-h-screen">
        
        <div class=" bg-white dark:bg-slate-800 max-w-full w-[448px] p-12  md:border md:dark:border-slate-700 rounded mx-auto text-black dark:text-white">
            {{-- <a href="/" title="{{\App\Models\Settings::get('SITE_NAME')}}">
                <img src="{{url('/storage/defaults/app_logo.svg')}}" alt="{{\App\Models\Settings::get('SITE_NAME')}}" class="block w-full" >
            </a> --}}
            
            <div class="mb-8 text-center">
                <h1 class="text-3xl ">@yield('title')</h1>
                <p class="text-sm">@yield('description')</p>
            </div>
            
            @yield('content', 'Default content')
            

        </div>
        
    </div>
 


</body>

 
<script src="{{ asset('js/admin.js') }}"></script>

</html>
