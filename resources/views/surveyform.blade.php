<x-layout>


<div id="body" class="bg-gray-300 flex-auto border border-green-500"> 


        <article class="bg-gray-300 p-24 border border-red-500 place-self-start text-left place-content-start place-items-start justify-items-start justify-self-start content-start items-start self-start bottom-3">
             <strong>   Good Evening, Counselor! </strong>
        </article>


   <!--  @foreach($survey as $survey)
    <a href="/createanswer/{{$survey}}"> <button class="bg-yellow-300"> Die and Dump </button> </a>
    @endforeach -->  
    @foreach($SurveyQuestions as $SurveyQuestion)

    @if($SurveyQuestion->type =='multiplechoice')
       <article class="bg-gray-300 border border-red-500 p-48">   
    <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                          
                <div class="flex-auto bg-white"> 

  
                        <table class="border border-black text-black">                     
                                <tr class="border border-black" >  
                                        <th class="px-24"> {{$SurveyQuestion->question}} (Multiple Choice) </th> </tr>
                                @foreach($choices as $choice)
                        
                                <th class="px-24"> <input type="checkbox" name="pets" value="Dog"> {{$choice->question_choice}} </th> 
                                @if($loop->iteration %2 ==0)         
                                <tr>
                                        @endif
                                @endforeach
                        </table>
                                                                                						
                <button type="submit" class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500"> Submit Answer </button>  
                                 
                </div>
                        
                   
                        
                    </form>	
                    
                
        </article>
{{$SurveyQuestions->links()}}  
        @endif
                

     @if($SurveyQuestion->type =='likertscale')
       <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                        
                    <div class="flex-auto space-y-2"> 
                                       
                    {{$SurveyQuestion->question}} (Likert Scale)
                                                          
                    @foreach($choices as $choice)
                    <input type="checkbox" name="pets" value="Dog"> {{$choice->question_choice}}<br>
                  
                    @endforeach
                                       						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer 
                     </button>  
                    </div>
                    {{$SurveyQuestions->links()}}

                    </form>	
        @endif

        @if($SurveyQuestion->type =='ratingscale')
        <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                          
                    <div class="flex-auto space-y-2"> 
                                       
                    {{$SurveyQuestion->question}} (Rating Scale)
                                                          
                    @foreach($choices as $choice)
                    <input type="checkbox" name="pets" value="Dog"> {{$choice->question_choice}}<br>
                  
                    @endforeach
                                       						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer 
                     </button>  
                    </div>
                    {{$SurveyQuestions->links()}}

                    </form>	
        @endif
       
        @if($SurveyQuestion->type =='matrixquestion')
        <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                            
                    <div class="flex-auto space-y-2"> 
                                       
                    {{$SurveyQuestion->question}}  (Matrix Question)
                                                          
                    @foreach($choices as $choice)
                    <input type="checkbox" name="pets" value="Dog"> {{$choice->question_choice}}<br>
                  
                    @endforeach
                                       						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer 
                     </button>  
                    </div>
                    {{$SurveyQuestions->links()}}

                    </form>	
        @endif

        @if($SurveyQuestion->type =='openended')
        
<form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                       
                    <div class="flex-auto space-y-2"> 
                                    
                    {{$SurveyQuestion->question}} (Open Ended)
                                                   
                    <input class="border border-gray-400 p-0.5 w-full"
			        type="text"
			        name="answer"
			        id="answer"
		        	required
                    value="{{old('answer')}}"
			        >
                   						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer 
                     </button>  
                    </div>
                    {{$SurveyQuestions->links()}}

                    </form>	
         
        @endif

    @endforeach           
                       
    </article>
        
</div>

</x-layout>