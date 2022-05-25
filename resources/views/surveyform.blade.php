<x-layout>


<div id="body" class="bg-gray-300 flex-auto"> 


    <article class="bg-gray-500">     
    @foreach($survey as $survey)
    <a href="/createanswer/{{$survey}}"> <button class="bg-yellow-300"> Die and Dump </button> </a>
    @endforeach
       <form method="POST" action="#"> 
       <div>
  
        </div>
    
        
            @foreach($SurveyQuestions as $SurveyQuestion)
            @csrf
            
                    @method('PATCH')
                    <div class="flex-auto space-y-2"> 
                    
                    
                    {{$SurveyQuestion->question}} 
                    @foreach($SurveyQuestion->surveyresponseanswers as $surveyanswer)
                    <input class="{{$surveyanswer->answer}}" name="{{$surveyanswer->answer}}", id="{{$surveyanswer->answer}}"> 
                    </input>
                    
                    @endforeach
                   
            @endforeach
						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer
                     </button>  
                    </div>

                    
       </form>	
       {{$SurveyQuestions->links()}}

       
    </article>
        
      

    

</div>





</x-layout>