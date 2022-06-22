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
                                          
                    <div class="flex-auto bg-gray-300"> 

                <div class="flex-auto bg-gray-300 border border-red-500">

                <table class="ml-4 mr-4 border border-black mt-2 bg-white text-black">                
                    
                        <tr class="">  
                               <td class="px-1">  <strong> {{$SurveyQuestion->question}} (Rating Scale Scale) lores epsum lores epsum lores epsum </strong> </td> 
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
       
        @if($SurveyQuestion->type =='matrixquestion')
        <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')
                                            
       <div class="flex-auto bg-gray-300"> 

                <div class="flex-auto bg-gray-300 border border-red-500">

                        <table class="ml-4 mr-4 border border-black mt-2 bg-white text-black">                
                
                        <tr class="">  
                        <td class="px-1">  <strong> {{$SurveyQuestion->question}} (matrixquestion) lores epsum lores epsum lores epsum </strong> </td> 
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

        @if($SurveyQuestion->type =='openended')
        
<form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/"> 
       @csrf
       @method('POST')

       <div class="flex-auto bg-gray-300"> 

                <div class="flex-auto bg-gray-300 border border-red-500">
                

                <div class="bg-white content-center items-center text-center border border-black mx-4 my-2">
            <label for="answer" class="content-center items-center block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <strong> {{$SurveyQuestion->question}} (Open Ended)  </strong> </label>
            <input type="text" id="answer" class="my-1 px-2 content-center items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block hover w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{old('answer')}}"> 
                </div>
                        <button class="bg-green-300 text-white rounded ml-1 py-1 px-3 hover:bg-green-500"> Back </button>                 
                        <button type="submit" class="bg-red-300 text-white rounded ml-1 py-1 px-2 hover:bg-red-500"> Submit Answer </button>  

                </div>  

        </div>

                    </form>	
                    {{$SurveyQuestions->links()}}
        @endif

    @endforeach           
                       
    </article>
        
</article>

</x-layout>