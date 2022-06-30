<x-layout>

   
@foreach($SurveyQuestions as $SurveyQuestion)

    @if($SurveyQuestion->type =='multiplechoice')

    
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12">Good Day, Counselor! </div>
        </div>


        <div class="flex justify-center w-full h-3/4 bg-gray-300 border border-green-500"> 
        <form method="POST" action="" class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-white border border-green-500">  
        @csrf @method('POST')  

 
  <div class="flex-nowrap bg-white w-full h-5/6">
    <table>

       <tr>
        <div class="flex justify-center items-center bg-white w-full h-auto h-1/6"> {{$SurveyQuestion->question}} (Multiple Choice) </div>

        <div class="flex bg-gray-300 h-1/6"> 

          @foreach($choices as $choice)
          <div class="flex justify-center items-center bg-white px-4 py-1 w-1/3 h-auto border border-black"> <input type="checkbox"> {{$choice->question_choice}} </div> 
          
          @if($loop->iteration %5 ==0)
        </div>

        <div class="flex bg-gray-700 h-1/6 mt-0.5"> 

          

        
          @endif
          
          @endforeach          
        </div>  
          

        


    </table>
  </div>

        <div class="flex justify-between w-full h-1/6 bg-red-100">
                <div class=""> <button class="px-8 py-2 bg-red-500 rounded-xl"> Back </div> 
                <div class=""> <button class="px-8 py-2 bg-blue-300 rounded-xl"> Edit </div> 
                <div class=""> <button class="px-8 py-2 bg-green-500 rounded-xl"> Next </div> 
                
        </div>
         
         <div class="mt-1"> {{$SurveyQuestions->links()}}  </div>

 
        </div>
        </form>
       
</div>

        
        

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
                       
    
        

</x-layout>