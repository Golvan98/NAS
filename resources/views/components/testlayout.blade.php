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


    <div id="header" class="flex justify-between w-full h-9 bg-red-500">

        <div> MSU IIT </div>

        <div> Welcome Golps </div>

        <div class="bg-red-300"> Logout button here </div>

        <div> Counselor Thingy WIth OL Button </div>

    </div>

    <div id="body" class="flex w-full h-5/6 bg-white">


        <div id="nav" class="flex-nowrap w-1/6 h-full bg-gray-500 space-y-16">

            <div class="mt-16 flex justify-center"> Tab 1 </div>

            <div class="flex justify-center"> Tab 2 </div>


        </div>

        <div id="content" class="flex-nowrap w-full bg-red-300 h-full">

            {{$slot}}

        </div>


    

    </div>


    <div id="footer" class="flex-nowrap w-full h-1/6">

                footer here
    </div>






















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







<footer> 




</footer>








</html>