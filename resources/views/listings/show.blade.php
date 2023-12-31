<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="antialiased">
   


<x-layout>
  <x-card>
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
            <img class="hidden w-48 mr-6 md:block object-contain" src={{ $listing->logo ? asset('storage/'. $listing->logo) : asset('images/no-image.png') }} alt="" />


                <h3 class="text-2xl mb-2">{{$listing["title"]}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing["company"]}}</div>
                <x-tags :tagsCsv="$listing['tags']"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{$listing['location']}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                           {{$listing['description']}}
                        </p>
              

                        <a
                            href="mailto:{{$listing['email']}}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href={{$listing['website']}}
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <x-card>
        <a href="{{$listing->id}}/edit">Edit</a>
        <form method="POST" action="/listings/{{$listing->id}}">@csrf @method("DELETE")
            <button>Delete</button>
            </form>
    </x-card>

</x-layout>
  
  
</body>

</html>
