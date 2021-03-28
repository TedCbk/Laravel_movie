<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Movie</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800 px-4">
        <div class="container p-4 mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="#">
                        <img src="{{ asset('images/800px-Netflix_2015_N_logo.svg.png') }}" alt="app" class="w-5">
                    </a>
                </li>
                <li class="ml-16">
                    <a href="" class="hover::text-gray-300">Movies</a>
                </li>
                <li class="ml-8">
                    <a href="" class="hover::text-gray-300">TV Shows</a>
                </li>
                <li class="ml-8">
                    <a href="" class="hover::text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
                    <div class="absolute top-0">
                        <i class="fas fa-search w-4 mt-2 ml-2 fill-current text-gray-500"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <a href="#">
                        <img src="{{ asset('images/DSC_0676-min.JPG') }}" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>
