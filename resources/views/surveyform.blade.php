<x-layout>


<div id="body" class="bg-gray-300 flex-auto"> 


    <article class="bg-gray-500">     
   <!--  @foreach($survey as $survey)
    <a href="/createanswer/{{$survey}}"> <button class="bg-yellow-300"> Die and Dump </button> </a>
    @endforeach -->

   
    @foreach($SurveyQuestions as $SurveyQuestion)

    @if($SurveyQuestion->type =='multiplechoice')
    <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
       <div>
       
       
      
        </div>                                      
                    <div class="flex-auto space-y-2"> 
                                       
                    {{$SurveyQuestion->question}} Multiple Choice ni gilvs @foreach ($choices as $choice)
                    {{$choice->choice}}
                
                @endforeach
                                            
                    
              
                
               

                    <input type="checkbox" name="pets" value="Dog"> Dog<br>
                    <input type="checkbox" name="pets" value="Cat"> Cat<br>
                    <input type="checkbox" name="pets" value="Bird"> Bird<br>
                    <input type="checkbox" name="pets" value="Mouse"> Mouse<br>
                    <input type="checkbox" name="pets" value="Hamster"> Hamster<br>
                    <input type="checkbox" name="pets" value="Alligator"> Alligator<br>
                    <input type="checkbox" name="pets" value="Other"> Other<br>
                                  						
            <button type="submit" 
                    
                    class="bg-red-300 text-white rounded ml-1 py-4 px-2 hover:bg-red-500">
                     Submit Answer 
                     </button>  
                    </div>
                    {{$SurveyQuestions->links()}}

                    </form>	
        @endif



     @if($SurveyQuestion->type =='likertscale')
       <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
       <div>
       
                    
      
        </div>                                      
                    <div class="flex-auto space-y-2"> 
                                       
                    {{$SurveyQuestion->question}} 
                                                          

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

        @if($SurveyQuestion->type =='ratingscale')
            echo ratingscale
        @endif

        

        @if($SurveyQuestion->type =='matrixquestion')
            echo matrixquestion
        @endif

        @if($SurveyQuestion->type =='openended')
            echo openended
        @endif


    @endforeach           
       
       
      

       
    </article>
        
      

    

</div>





</x-layout>