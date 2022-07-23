<x-layout>

<div class="w-full bg-red-300 flex-nowrap">

  <div class="w-full bg-blue-400 flex justify-center items-center h-5/6">

    <div class="w-4/5 bg-gray-500 flex-nowrap justify-center h-5/6 ">
      
        <div class="w-full bg-red-300 h-1/6 flex justify-center items-center"> 
          
          <div> <strong> {{$survey->name}} </strong> </div>

        </div>

        @foreach($SurveyQuestions as $SurveyQuestion)
        <div class="w-full bg-red-500 text-white h-1/6 flex justify-between items-center"> 
          
        <div class="w-1/3 text-center mx-4 mt-4 py-1 bg-red-500 rounded-xl"> <button class="bg-red-300 text-black px-4 py-1 rounded-xl ml-4">  {{$SurveyQuestion->question}} </button> </div>

        <x-editquestionmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}"> </x-editquestionmodal> 

        <div class="w-1/3 "> <button class="text-center text-center block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  py-2 rounded-xl text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}">  Edit Question Choices </button> </a>  </div> 
        </div>
        @endforeach

        <div class="w-full bg-red-500 text-black h-1/6 flex justify-between items-center"> 
          
          <div> <button class="bg-red-300 text-black px-4 py-1 rounded-xl ml-4"> Back Ni Bitch </button> </div>
  
          <div> <button class="bg-green-300 text-black px-4 py-1 rounded-xl mr-4"> Next Ni Bitch </button></div>

        </div>

    </div>

  </div>

  

  <div class="w-full bg-red-300 h-1/6 flex justify-center items-center">
 oten
  </div>
     
</div>
    
</x-layout>