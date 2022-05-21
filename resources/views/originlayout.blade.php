<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<div id="main" class="flex-no-wrap">


        <div>
            <header class="flex bg-red-500">   
                <div class="bg-red-500 flex-auto"> Header 1 </div>
                <div class="bg-red-500 flex-auto"> Header 2</div>
                <div class="bg-red-500 items-right"> Header 3</div>
            </header>
        </div>


    <div id="container" class="flex">

        <div id="nav" class="bg-gray-900 px-12 text-gray-100 font-bold grow-0"> nav area
            <nav>
            <ul class="space-y-12"> 
                <li class="text-gray-100 font-bold"> Home </li>
                <li class="text-gray-100 font-bold"> Grades </li>
                <li class="text-gray-100 font-bold"> Schedule  </li>
            </ul>     
            </nav>
        </div>
        
    <div id="body" class="bg-gray-300 flex-auto"> CONTENT AREA 


        <article class="bg-gray-500 flex">     
        
          
            <article class="bg-red-500 flex-auto"> CONTENT AREA 1
                <div class=""> box </div>
                <div class=""> box 2 </div>
            </article>

            <article class="bg-gray-500 flex flex-auto"> CONTENT AREA 2 <br>
                <div class=""> box </div>
                <div class=""> box 2 </div>
            </article>

            </article class="">
            <article class="bg-gray-500 items-center flex-auto align-center content-center"> CONTENT AREA 3 <br>
                <div class=""> box </div>
                <div class=""> box 2 </div>
            </article>

    </div>
        

</div>

<footer class="bg-gray-500">
    FOOTER 
</footer>




















</html>