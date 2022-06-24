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
       
       @csrf
       @method('POST')
       <article class="bg-gray-300 border border-red-500 mt-2">   
        <form method="POST" action="/createanswer/{{$survey}}/{{$SurveyQuestion->id}}/">                         
                <div class="w-full h-60 flex-auto bg-gray-300 border border-green-500"> 

                        <div class="ml-48 w-4/5 h-4/5 mt-4 bg-white border border-black">

                        <table class="w-full h-full  border border-red-500 mt-2 bg-gray-500 text-black">      

                                <tr class="bg-white">  
                                        <th colspan="3"class="whitespace-pre font-bold items-center text-center"> {{$SurveyQuestion->question}} (Multiple Choice) </th>                                         
                                </tr>
                        
                                
                                <tr>
                                     
                                @foreach($choices as $choice)
                                <td class="1/3 bg-red-100" colspan="1"> <div class="w-full">   <input type="checkbox" name="" value="">  {{$choice->question_choice}}  </div> </td>
                                <td> yawa </td>
                                @if($loop->iteration %3 ==0)  
                                </div>

                                <div class="w-full">
                                
                                @endif
                                @endforeach
                                <tr class="">
                                        
                                <td class="items-start bg-gray-100 w-full"> <button class="items-start bg-green-500 text-white  rounded ml-7 py-1 px-6 hover:bg-green-700 t"> Back </button> </td> 
                                <td class="items-center bg-gray-300 w-full"> <button class="items-start bg-blue-500 text-white py-1 px-8 hover:bg-blue-700 "> Edit </button> </td>                                                          						
                                <td class="items-end bg-gray-500  w-full"> <button type="submit" class="items-start bg-red-500  text-white rounded ml-4 mr-2 py-2 px-4 whitespace-pre mb-2 hover:bg-red-700"> Submit Answer </button> </td>  
                                
                                </tr>
                                   
                        </table>
                   
                        </div>    
                </div>
                        
                   
                        
        </form>	              
        </article>
                        {{$SurveyQuestions->links()}}  
    @endif
                

     @if($SurveyQuestion->type =='likertscale')
     <article class="bg-gray-300 border border-red-500 mt-2"> 
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
                        </tr>

                        <tr class="">
                                        
                                <td colspan="2" class=" items-start w-full"> <button class="items-start bg-green-500 text-white  rounded ml-7 py-1 px-6 hover:bg-green-700 t"> Back </button> </td> 
                                <td colspan="3" class="items-center w-full"> <button class="items-start bg-blue-500 text-white  rounded ml-7 py-1 px-8 hover:bg-blue-700 "> Edit </button> </td>                                                          						                         
                                <td colspan="1" class=" items-end w-full"> <button type="submit" class="items-center text-center align-center py-2 ml-5 mt-2 bg-red-500  text-white rounded whitespace-pre mb-2 hover:bg-red-700">  Submit Answer  </td>
                                
                        </tr>
                      
                                       
                </table>
                <button class="bg-green-300 text-white rounded ml-1 py-1 px-3 hover:bg-green-500"> Back </button>                 

                <button type="submit" class="bg-red-300 text-white rounded ml-1 py-1 px-2 hover:bg-red-500"> Submit Answer </button>  

                </div>    
        </div>

        </form>
        </article>
        
                    {{$SurveyQuestions->links()}}  	
        @endif

        @if($SurveyQuestion->type =='ratingscale')
        <article>
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
        </article>
                    {{$SurveyQuestions->links()}}       
        @endif
       
        @if($SurveyQuestion->type =='matrixquestion')
        <article>
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
        </article>
                    {{$SurveyQuestions->links()}} 	
        @endif

        @if($SurveyQuestion->type =='openended')
        <article>
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
        </article>
                    {{$SurveyQuestions->links()}}
        @endif

    @endforeach           
                       
    
        
</article>

</x-layout>