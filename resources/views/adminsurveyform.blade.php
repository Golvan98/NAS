<x-adminhomelayout>
        

    @if($SurveyQuestion->type =='multiplechoice')

    
<div class="w-full bg-gray-300">

        <div id="First Tab Hello Counselor Thingy" class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                        <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
        </div>         

        <div class="flex justify-center items-start w-full h-3/4 bg-gray-300"> 

                <div id="first container" class="mt-8 mx-6 flex-nowrap w-full h-5/6 bg-white border border-gray-300">  
                
                        <div id="second container" class="flex w-full h-full bg-white items-center justify-center"> 

                         <div id="third container" class="w-full h-auto flex-nowrap mx-4 border border-black bg-gray-300">
                               
                          
                                <div class="w-full bg-gray-300 h-1/6 text-white flex justify-start items-center "> 
          
                                 <div class="text-black text-lg ml-12 mt-3"> <strong> {{$SurveyQuestion->question}} ({{$SurveyQuestion->type}})</strong> </div>

                                </div>

                
                                <div class="w-full flex flex-wrap bg-gray-300 mt-4 "> 

                                @foreach($choices as $choice)     

                                <div class="justify-between bg-gray-300 px-2 py-1 w-1/4  h-auto truncate hover:text-clip"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 

                                @endforeach
                                </div>



                                <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white mt-12 ">

                                        <div class="w-1/3"> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-1 bg-green-300 rounded-md"> Back </button> </a>  </div> 

                                        <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  

                                        <div class="w-1/3 flex justify-end mr-2"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-1 bg-green-500 rounded-md"> Edit Choices </button> </div> 

                                </div>

                         


                         </div>



                        </div>
                
                </div>

        </div>
       
</div>

         

    @endif
                

     @if($SurveyQuestion->type =='likertscale')

<div class="w-full bg-gray-300">

        <div id="First Tab Hello Counselor Thingy" class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                        <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
        </div>         

        <div class="flex justify-center items-start w-full h-3/4 bg-gray-300"> 

                <div id="first container" class="mt-8 mx-6 flex-nowrap w-full h-5/6 bg-white border border-gray-300">  
                
                        <div id="second container" class="flex w-full h-full bg-white items-center justify-center"> 

                        <div id="third container" class="w-full h-auto flex-nowrap mx-4 border border-black bg-gray-300">
                        
                        
                                <div class="w-full bg-gray-300 h-1/6 text-white flex justify-start items-center "> 
        
                                <div class="text-black text-lg ml-12 mt-3"> <strong> {{$SurveyQuestion->question}} ({{$SurveyQuestion->type}})</strong> </div>

                                </div>

                
                                <div class="w-full flex flex-wrap bg-gray-300 mt-4 "> 

                                @foreach($choices as $choice)     

                                <div class="justify-between bg-gray-300 px-2 py-3 flex-auto truncate hover:text-clip border border-black"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 

                                @endforeach
                                </div>



                                <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white mt-12 ">

                                        <div class="w-1/3"> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-1 bg-green-300 rounded-md"> Back </button> </a>  </div> 

                                        <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  

                                        <div class="w-1/3 flex justify-end mr-2"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-1 bg-green-500 rounded-md"> Edit Choices </button> </div> 

                                </div>

                        


                        </div>



                        </div>
                
                </div>

        </div>

</div>
        @endif

        @if($SurveyQuestion->type =='ratingscale')
     
    
<div class="w-full bg-gray-300">

        <div id="First Tab Hello Counselor Thingy" class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                        <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
        </div>         

        <div class="flex justify-center items-start w-full h-3/4 bg-gray-300"> 

                <div id="first container" class="mt-8 mx-6 flex-nowrap w-full h-5/6 bg-white border border-gray-300">  
                
                        <div id="second container" class="flex w-full h-full bg-white items-center justify-center"> 

                        <div id="third container" class="w-full h-auto flex-nowrap mx-4 border border-black bg-gray-300">
                        
                        
                                <div class="w-full bg-gray-300 h-1/6 text-white flex justify-start items-center "> 

                                <div class="text-black text-lg ml-12 mt-3"> <strong> {{$SurveyQuestion->question}} ({{$SurveyQuestion->type}})</strong> </div>

                                </div>

                
                                <div class="w-full flex flex-wrap bg-gray-300 mt-4 "> 

                                @foreach($choices as $choice)     

                                <div class="justify-between bg-gray-300 py-2 flex-auto truncate hover:text-clip border border-black"> <input class="ml-2 "type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 

                                @endforeach
                                </div>



                                <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white mt-12 ">

                                        <div class="w-1/3"> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-1 bg-green-300 rounded-md"> Back </button> </a>  </div> 

                                        <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  

                                        <div class="w-1/3 flex justify-end mr-2"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-1 bg-green-500 rounded-md"> Edit Choices </button> </div> 

                                </div>

                        


                        </div>



                        </div>
                
                </div>

        </div>

</div>
        @endif
       


        @if($SurveyQuestion->type =='matrixquestion')
        
        
    
        <div class="w-full bg-gray-300">

<div id="First Tab Hello Counselor Thingy" class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
</div>         

<div class="flex justify-center items-start w-full h-3/4 bg-gray-300"> 

        <div id="first container" class="mt-8 mx-6 flex-nowrap w-full h-5/6 bg-white border border-gray-300">  
        
                <div id="second container" class="flex w-full h-full bg-white items-center justify-center"> 

                <div id="third container" class="w-full h-auto flex-nowrap mx-4 border border-black bg-gray-300">
                
                
                        <div class="w-full bg-gray-300 h-1/6 text-white flex justify-start items-center "> 

                        <div class="text-black text-lg ml-12 mt-3"> <strong> {{$SurveyQuestion->question}} ({{$SurveyQuestion->type}})</strong> </div>

                        </div>

        
                        <div class="w-full flex flex-wrap bg-gray-300 mt-4 "> 

                        @foreach($choices as $choice)     

                        <div class="justify-between bg-gray-300 py-2 flex-auto truncate hover:text-clip border border-black"> <input class="ml-2 "type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 

                        @endforeach
                        </div>



                        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white mt-12 ">

                                <div class="w-1/3"> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-1 bg-green-300 rounded-md"> Back </button> </a>  </div> 

                                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  

                                <div class="w-1/3 flex justify-end mr-2"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-1 bg-green-500 rounded-md"> Edit Choices </button> </div> 

                        </div>

                


                </div>



                </div>
        
        </div>

</div>

</div>
        @endif

        @if($SurveyQuestion->type =='openended')
        
        <div class="w-full bg-gray-300">

<div id="First Tab Hello Counselor Thingy" class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
</div>         

<div class="flex justify-center items-start w-full h-3/4 bg-gray-300"> 

        <div id="first container" class="mt-8 mx-6 flex-nowrap w-full h-5/6 bg-white border border-gray-300">  
        
                <div id="second container" class="flex w-full h-full bg-white items-center justify-center"> 

                <div id="third container" class="w-full h-auto flex-nowrap mx-4 border border-black bg-gray-300">
                
                
                        <div class="w-full bg-gray-300 h-1/6 text-white flex justify-start items-center "> 

                                <div class="text-black text-lg ml-12 mt-3"> <strong> {{$SurveyQuestion->question}} ({{$SurveyQuestion->type}})</strong> </div>

                        </div>

        
                        <div class="w-full flex flex-wrap bg-gray-300 mt-4 "> 

                                <div class="flex bg-gray-300 h-full w-full"> 

                        
                                        <input class="mx-2 bg-gray-300 w-full h-full py-4"  type="text" name="answer" id="answer" placeholder="Answer Here" value="{{old('answer')}}"> 


                                </div>  
                        </div>



                        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white mt-8 ">

                                <div class="w-1/3"> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-1 bg-green-300 rounded-md"> Back </button> </a>  </div> 

                                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  

                                <div class="w-1/3 flex justify-end mr-2"> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-1 bg-green-500 rounded-md"> Edit Choices </button> </div> 

                        </div>

                


                </div>



                </div>
        
        </div>

</div>

</div>
        @endif

      
                       
    
</x-adminhomelayout>