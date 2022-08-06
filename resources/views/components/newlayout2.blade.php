<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src ="app.js"> </script>
  <script src ="public/app.js"> </script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="../path/to/flowbite/dist/flowbite.js"></script>
  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
  <link href="/css/app.css" rel="stylesheet">
</head>

<div id="main" class="flex-no-wrap bg-gray-300 w-full h-screen">


    <div id="header" class="flex justify-between w-full h-12 bg-red-700">

        <div class=" bg-red-700 font-bold flex items-center text-white px-12 text-left"> 
                My.IIT 
        </div>

        <div class="bg-red-700 flex-auto flex items-center">  
                <div class="ml-4 space-y-1">
                    <div class="w-6 h-0.5 bg-white"></div>
                    <div class="w-6 h-0.5 bg-white"></div>
                    <div class="w-6 h-0.5 bg-white"></div>
                </div>
        </div>

        @auth
        <form method="POST" action="/logout" class="bg-red-700 flex items-center text-white font-bold mr-2"> 
                @csrf
                Welcome Sir {{ auth()->user()->firstname }} ! 
                

                
                    <div class="relative inline-block ml-1 flex">
                        <img class="mb-1 inline-block object-cover w-8 h-8 rounded-full mt-1" src="https://pbs.twimg.com/profile_images/1430917464792072200/rqqJOqer_400x400.jpg" alt="Profile image"/>
                        <span class="absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                    </div>
               

                <button type="submit" class="bg-red-500 px-2 py-1 rounded mx-2"> logout </button> 
                Counselor 
           
        </form>
        @endauth

        @guest
        <div class="bg-red-700 flex items-center text-white font-bold mr-2">

                <div class="relative inline-block">
                    <img class="mb-2 inline-block object-cover w-8 h-8 rounded-full" src="https://pbs.twimg.com/profile_images/1430917464792072200/rqqJOqer_400x400.jpg" alt="Profile image"/>
                    <span class="mb-2 absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                </div>
                
                <x-loginmodal> login </x-loginmodal> 
                 Counselor
            
        </div>
         @endguest
        

    </div id="headend">

    <div id="allcontent" class="flex w-full h-5/6 bg-white">


        <div id="nav" class="flex-nowrap w-1/6 h-full text-white font-bold bg-gray-900 space-y-2 items-end">

           

        <a href="/home"> 
            <div class="mt-4 h-1/6 flex justify-center bg-transparent">

             <img class="object-fill h-full w-4-5" src="{{ asset('storage/nas2.png') }}" alt="description of myimage">

            </div> 
        </a>

            <div class="flex justify-center h-2/6"> 
             <img class="object-fill w-4/5 h-4/5" src="{{ asset('storage/manage.png') }}" alt="description of myimage">

            </div>

        <a href="/home">    
            <div class="flex h-1/6 text-yellow-300 font-bold justify-center">  </div>
            
             <div class="flex h-2/6 justify-center"> 

            <img class="object-fill w-4/5 h-3/5" src="{{ asset('storage/home.png') }}" alt="description of myimage">
            </div>
        </a>

        </div>

        
            
            {{$slot}}
           
        



    </div id="allcontentend">



    <div id="footer1" class="bg-green-300 w-full h-1/6 flex-nowrap ">

            <div class="w-full h-full flex"> 
                
                <div class="flex w-1/6 h-full bg-gray-700"> 
                    
            </div>

                <div class="flex w-full h-full bg-gray-300 border border-gray-400"> 
                    <strong> <p class="ml-2 mt-3"> Copyright © 2018 onwards, <span class="text-blue-500"> Mindanao State University, Iligan Institute of Technology. </span> </p>
                </div>
            </div>
                
            <div class="w-full h-2/6 bg-gray-900"> </div>

    </div>



@if ($message = Session::get('success'))
    <div x-data="{show: true}"
     x-show="show"
     x-init="setTimeout(() => show = false, 3000)"
     class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm" >
     <strong>{{$message }}</strong>
    </div>
    @endif


@if ($message = Session::get('error'))
    <div x-data="{show: true}"
     x-show="show"
     x-init="setTimeout(() => show = false, 3000)"
     class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
     <strong>{{$message }}</strong>
    </div>

    @endif




</html>