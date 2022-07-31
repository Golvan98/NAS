<x-layout>

<div class="w-full bg-gray-300 flex-nowrap">

  <div class="w-full bg-gray-300 flex justify-center items-center h-5/6">

    <div class="w-4/5 h-auto bg-gray-500 flex-nowrap justify-center h-5/6  border border-black">
      
        <div class="w-full bg-gray-500 h-1/6 text-white flex justify-center items-center"> 
          
          <div> <strong> {{$survey->name}}  </strong> </div>

        </div>

        @foreach($SurveyQuestions as $SurveyQuestion)
        <div class="w-full bg-gray-300 text-white h-1/6 flex justify-between items-center"> 
          
        <div class="w-1/3 text-center mx-4 mt-4 py-1 bg-gray-300 rounded-xl"> <button class="bg-gray-300 text-black px-4 py-1 rounded-xl ml-4"> <strong> {{$SurveyQuestion->question}} </strong> </button> </div>

        <x-editquestionmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-editquestionmodal> 

        <div class="w-1/3 flex justify-center items-center"> <button class="text-center text-center block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium px-4 py-2 rounded-xl text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}">  Edit Question Choices </button> </a>  </div> 
        </div>
        @endforeach

        <div class="w-full bg-gray-300 text-black h-1/6 flex justify-between items-center"> 
          
          <div> <a href="/surveylist"> <button class="bg-red-300 text-black px-4 py-1 rounded-xl ml-4"> Back  </button> </a> </div>
  
          <div class="mr-4 mb-2"> <x-addquestionmodal surveyid="{{$survey->id}}"> </x-addquestionmodal> </div> 
        </div>

    </div>

  </div>

  

  <div class="w-full bg-red-300 h-1/6 flex-nowrap">

    <div class="w-full h-full flex justify-center items-center bg-gray-500">

      <div class="w-4/5 h-1/2 text-white">
      {{$SurveyQuestions->links()}} 
      </div>
    
    </div>

  </div>
     
</div>
    
</x-layout>