@props(['questioncategory'])
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
            <a href="/home"> My.IIT </a>
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
                Counselor 
           
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

            <a href="/surveylist"> 
            <div class="mt-4 h-1/6 flex justify-center bg-transparent">

             <img class=" object-fill h-full w-4/6" src="{{ asset('storage/newnas.png') }}" alt="description of myimage"><br>
            

            </div> 
            </a>

            <div class="flex justify-center text-sm">  Manage Surveys </div>
            
            <a href="/viewsurveys">
            <div class="flex justify-center h-1/6"> 

             <img class="object-fill" src="{{ asset('storage/newmanageresult.png') }}" alt="description of myimage">

            </div>

            <div class="flex justify-center mb-4"> Manage Results </div>
            </a>


            @if ($questioncategory == "Anxiety") 
            <div class="flex justify-center text-sm text-yellow-200"> Anxiety </div>
            @else
            <div class="flex justify-center text-sm"> Anxiety </div>
            @endif

            @if ($questioncategory == "Student-Teacher Relationship") 
            <div class="flex justify-center text-sm text-yellow-200"> Student-Teacher Relationship </div>
            @else
            <div class="flex justify-center text-sm"> Student-Teacher Relationship </div>
            @endif

            @if ($questioncategory == "Parent-Separation") 
            <div class="flex justify-center  text-sm text-yellow-200"> Parent-Separation </div>
            @else
            <div class="flex justify-center text-sm"> Parent-Separation </div>
            @endif

            @if ($questioncategory == "Stress-Management") 
            <div class="flex justify-center  text-sm text-yellow-200"> Stress-Management  </div>
            @else 
            <div class="flex justify-center  text-sm"> Stress-Management  </div>
            @endif

            @if ($questioncategory == "Peer Pressure") 
            <div class="flex justify-center  text-sm text-yellow-200"> Peer Pressure </div>
            @else 
            <div class="flex justify-center  text-sm"> Peer Pressure  </div>
            @endif

            @if ($questioncategory == "Cyberbullying") 
            <div class="flex justify-center  text-sm text-yellow-200"> Cyberbullying </div>
            @else 
            <div class="flex justify-center  text-sm"> Cyberbullying  </div>
            @endif

            @if ($questioncategory == "Relationships") 
            <div class="flex justify-center  text-sm text-yellow-200"> Relationships </div>
            @else 
            <div class="flex justify-center  text-sm"> Relationships  </div>
            @endif

            @if ($questioncategory == "Physical-Psychological-Abuse") 
            <div class="flex justify-center  text-sm text-yellow-200"> Physical-Psychological-Abuse </div>
            @else 
            <div class="flex justify-center  text-sm"> Physical-Psychological-Abuse  </div>
            @endif

            @if ($questioncategory == "Bullying") 
            <div class="flex justify-center  text-sm text-yellow-200"> Bullying </div>
            @else 
            <div class="flex justify-center  text-sm"> Bullying  </div>
            @endif

            @if ($questioncategory == "Student-Teacher-Conflict") 
            <div class="flex justify-center  text-sm text-yellow-200"> Student-Teacher-Conflict </div>
            @else 
            <div class="flex justify-center  text-sm"> Student-Teacher-Conflict  </div>
            @endif


            
          
            
            
            

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