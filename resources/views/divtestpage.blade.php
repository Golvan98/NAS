<x-layout>

<div class="w-full bg-gray-300 flex justify-center items-center ">

  <div class="flex-nowrap w-4/5 h-3/4 bg-gray-300 border border-red-500">

    <div class="w-full h-1/6 flex justify-center bg-red-300 items-center "> 
      
      <div> Good Day, Counselor! </div>

    </div>

    @foreach($surveys as $survey)
    <div class="w-full h-1/6 flex justify-between bg-red-300 items-center space-y-1 "> 

      <div class="w-1/5 flex justify-center "> <button class="bg-gray-100 px-4 py-1 rounded-xl">  {{$survey->name}}</button> </div> 
      <div class="w-1/5 flex justify-center "> <a href="/surveyform/{{$survey->id}}"> <button class="bg-gray-200 px-4 py-1 rounded-xl">  Answer Survey </button> </a> </div>
      <div class="w-1/5 flex justify-center "> <x-surveymodal survey="{{$survey->id}}" surveyname="{{$survey->name}}"> </x-surveymodal> </div>
      <div class="w-1/5 flex justify-center "> <a href="/questionlist/{{$survey->id}}"> <button class="bg-gray-400 px-4 py-1 rounded-xl">  Edit Questions </button> </a> </div>
      <div class="w-1/5 flex justify-center "> <button class="bg-gray-500 px-4 py-1 rounded-xl">  Create Survey </button> </div>

    </div>
    @endforeach

    <div class="w-full h-1/6 flex justify-between bg-gray-300 items-center ">

      <div class="w-1/5 flex justify-center "> <a href="/home"> <button class="bg-red-500 px-8 py-2 rounded-xl">  Back </button> </a> </div> 
      <div class="w-1/5 flex justify-center "> <x-createsurveymodal> </x-createsurveymodal> </div> 

    </div> 

    <div class="w-full h-1/7 items-center mt-1">

       {{$surveys->links()}} 
  
    </div> 
      

  </div>
  

     
</div>
    
</x-layout>