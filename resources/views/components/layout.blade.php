<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src ="app.js"> </script>
  <script src ="public/app.js"> </script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  
  <script src="../path/to/flowbite/dist/flowbite.js"> </script>
  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                       
  

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
                Welcome {{ auth()->user()->firstname }} ! 
                

                
                    <div class="relative inline-block ml-1 flex">
                        <img class="mb-1 inline-block object-cover w-8 h-8 rounded-full mt-1" src="https://pbs.twimg.com/profile_images/1554275654157598721/hssHJJgU_400x400.jpg" alt="Profile image"/>
                        <span class="absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                    </div>
               

                <button type="submit" class="bg-red-500 px-2 py-1 rounded mx-2"> logout </button> 
                 
           
        </form>
        @endauth

        @guest
        <div class="bg-red-700 flex items-center text-white font-bold mr-2">

                <div class="relative inline-block">
                    <img class="mb-2 inline-block object-cover w-8 h-8 rounded-full" src="https://pbs.twimg.com/profile_images/1554275654157598721/hssHJJgU_400x400.jpg" alt="Profile image"/>
                    <span class="mb-2 absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                </div>
                
                <x-loginmodal> login </x-loginmodal> 
                 Counselor
            
        </div>
         @endguest
        

    </div id="headend">

    <div id="allcontent" class="flex w-full h-5/6 bg-white">


        <div id="nav" class="flex-nowrap w-1/6 h-full text-white font-bold bg-gray-900 space-y-1 items-end">

            <a href="/home"> 
            <div class="mt-4 h-1/6 flex justify-center bg-transparent mt-4">

            <img class=" flex justify-start object-fill h-full w-4/6" src="{{ asset('storage/newhome.png') }}" alt="description of myimage"><br>
            <br>
           

            </div> 
            <div class="flex justify-center text-white font-bold text-sm"> Home </div>
            
            </a>


        </div>

        
            
            {{$slot}}
           
        



    </div id="allcontentend">



    <div id="footer1" class="bg-green-300 w-full h-1/6 flex-nowrap ">

            <div class="w-full h-full flex"> 
                
                <div class="flex w-1/6 h-full bg-gray-900"> 
                    
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