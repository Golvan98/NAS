<x-layout>


<article id="body" class="bg-gray-300 flex-auto border border-green-500"> 


        <article class="bg-gray-300 p-12 border border-white flex text-align-bottom">
            <div class ="absolute inline-block align-baseline px-12 py-6"> <strong> Good Evening, Counselor! </div> </strong> 
        </article>


   <!--  @foreach($survey as $survey)
    <a href="/createanswer/{{$survey}}"> <button class="bg-yellow-300"> Die and Dump </button> </a>
    @endforeach -->  
    @foreach($SurveyQuestions as $SurveyQuestion)

    @if($SurveyQuestion->type =='multiplechoice')
       <article class="bg-gray-300 border border-red-500 mt-2">   
        <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                          
                <div class="flex-auto bg-gray-300"> 

                        <div class="px-48 flex-auto bg-gray-300 border border-white">

                        <table class="border border-red-500 mt-2 bg-white text-black">                     
                                <tr class="px-48 bg-white">  
                                        <td colspan="2"class="px-48 whitespace-pre font-bold text-start mx-24 flex-auto"> {{$SurveyQuestion->question}} (Multiple Choice) </td> 
                                        <td> </td>
                                </tr>
                        
                                
                                <tr>
                                @foreach($choices as $choice)
                                <td class="px-6 whitespace-pre "> <input type="checkbox" name="" value=""> {{$choice->question_choice}} </td>  
                                @if($loop->iteration %3 ==0)  
                                </tr>
                                <tr>
                                @endif
                                @endforeach
                        </table>
                <button class="bg-green-300 text-white rounded ml-1 py-1 px-3 hover:bg-green-500"> Back </button>                                                       						
                <button type="submit" class="bg-red-300 text-white rounded ml-1 py-1 px-2 hover:bg-red-500"> Submit Answer </button>  
                        </div>    
                </div>
                        
                   
                        
                    </form>	
                    
                
        </article>
                        {{$SurveyQuestions->links()}}  
    @endif
                

     @if($SurveyQuestion->type =='likertscale')
       <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                        
        <div class="flex-auto bg-gray-300"> 

                <div class="flex-auto bg-gray-300 border border-red-500">

                <table class="ml-20 mr-4 border border-black mt-2 bg-white text-black">                
                    
                        <tr class="">  
                               <td class="px-4">  <strong> {{$SurveyQuestion->question}} (Likert Scale) lores epsum lores epsum lores epsum </strong> </td> 
                        @foreach($choices as $choice)
                                <td colspan="1"class="px-4 py-4 border border-black whitespace-pre font-bold text-start flex-auto"> <input type="checkbox" name="pes" value=""> {{$choice->question_choice}} </input></td>                               
                        @endforeach
                      
                                       
                </table>
                <button class="bg-green-300 text-white rounded ml-1 py-1 px-3 hover:bg-green-500"> Back </button>                 

                <button type="submit" class="bg-red-300 text-white rounded ml-1 py-1 px-2 hover:bg-red-500"> Submit Answer </button>  

                </div>    
        </div>

                    </form>
                    {{$SurveyQuestions->links()}}  	
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
        
</article>

</x-layout>