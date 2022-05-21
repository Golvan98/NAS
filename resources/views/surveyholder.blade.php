<x-layout>


<div id="body" class="bg-gray-300 flex-auto"> 


    <article class="bg-gray-500">     

    
       @foreach($surveys as $survey)
       <div>
       {{$survey->survey_name}}
        </div>
    

            @foreach($survey->surveyquestion as $surveyquestions)

                    <div class="flex-auto space-y-2"> 
                    <form method="POST" action="#"> 
                    @csrf
                    @method('PATCH')
                    {{$surveyquestions->question}} 

                    <input class=""> 
                    </input>
                    <button type="submit" 
                    
                       class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
					    Submit Answer
						</button>
            </form>	
            @endforeach
						
                        
                    </div>
       @endforeach
    </article>
        
      

    

</div>





</x-layout>