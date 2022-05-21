<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<div id="main" class="flex-no-wrap bg-gray-300">


        <div>
            <header class="flex bg-red-700">   

            <div class="mt-1 bg-red-700 font-bold text-white px-12 text-left"> 
                My.IIT 
            </div>

            <div class="bg-red-700 flex-auto">  
                <div class="ml-4 mt-2 space-y-1">
                    <div class="w-6 h-0.5 bg-white"></div>
                    <div class="w-6 h-0.5 bg-white"></div>
                    <div class="w-6 h-0.5 bg-white"></div>
                </div>
            </div>

            @auth
                                               
            <form method="POST" action="/logout"> 
            @csrf
            Welcome {{ auth()->user()->firstname }} !
            
            <button type="submit" class="bg-red-500 px-2 py-1 m-1 rounded"> logout </button> </a> 

            </form>
            <div class="bg-red-700 items-right text-white font-bold mr-2">
                <div class="relative inline-block">
                    <img class="inline-block object-cover w-8 h-8 rounded-full" src="https://pbs.twimg.com/profile_images/1430917464792072200/rqqJOqer_400x400.jpg" alt="Profile image"/>
                    <span class="absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                </div>
                Counselor    
            @endauth





            @guest
            <div class="bg-red-700 items-right text-white font-bold mr-2">
                <div class="relative inline-block">
                    <img class="inline-block object-cover w-8 h-8 rounded-full" src="https://pbs.twimg.com/profile_images/1430917464792072200/rqqJOqer_400x400.jpg" alt="Profile image"/>
                    <span class="absolute bottom-0 right-0 inline-block w-2 h-2 bg-green-600 border-2 border-white rounded-full"></span>
                </div>
                
                


                
                <a href="/login"> <button class="bg-red-500 px-2 py-1 m-1 rounded"> loginz </button> </a>
                 Counselor
                </div>
                @endguest
            </header>
            </div>


    <div id="container" class="flex">

        <div id="nav" class="bg-gray-900 px-12 text-gray-100 font-bold grow-0"> 
            <nav>

                <div class="flex-auto "> 
                    <ul class="py-12"> 
                    <div class="pb-24">     <a href="/home"><li class="text-gray-100 font-bold"> Home </li> </a> </div>
                    <div class="pb-24">     <li class="text-gray-100 font-bold"> Grades </li> </div>
                    <div class="pb-24">     <li> <a href="/surveylist">  Surveys </li> </a> </div>
                    </ul> 
                </div>
                    
            </nav>
        </div>
        
        {{ $slot }}
    </div>
        

</div>

<footer class="bg-gray-500">
    FOOTER 
</footer>




















</html>