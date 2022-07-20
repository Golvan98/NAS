<x-layout>

<div class="w-full bg-gray-300 flex justify-center items-center ">

  <div class="flex-nowrap w-4/5 h-3/4 bg-gray-300 border border-red-500">

    <div class="w-full h-1/6 flex justify-center bg-red-300 items-center "> 
      
      <div> Good Day, Counselor! </div>

    </div>

    @foreach($surveys as $survey)
    <div class="w-full h-1/6 flex justify-between bg-red-300 items-center "> 

      <div class="w-1/5 flex justify-center "> <button class="bg-gray-100 px-4 py-2 rounded-xl">  {{$survey->name}}</button> </div>
      <div class="w-1/5 flex justify-center "> <button class="bg-gray-200 px-4 py-2 rounded-xl">  Answer Survey </button> </div>
      <div class="w-1/5 flex justify-center "> <button class="bg-gray-300 px-4 py-2 rounded-xl">  Manage Survey </button> </div>
      <div class="w-1/5 flex justify-center "> <button class="bg-gray-400 px-4 py-2 rounded-xl">  Edit Questions </button> </div>
      <div class="w-1/5 flex justify-center "> <button class="bg-gray-500 px-4 py-2 rounded-xl">  Create Survey </button> </div>

    </div>
    @endforeach
  </div>

     
</div>
    
</x-layout>