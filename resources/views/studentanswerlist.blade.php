<x-layout>

<div id="main" class="flex-nowrap w-full h-full bg-gray-300">


    <div class="w-full bg-white flex h-1/6 justify-center items-end  ">
        
       <div class="w-full flex-nowrap ">
        
            <div class="w-full flex justify-center items-end"> 
                <div class="w-4/5 text-lg"> <strong> Good Evening, Counselor! </strong> </div>
            </div>

            <div class="w-full flex justify-center"> 
                <div class="w-full h-0.5 bg-red-500 mx-2">  </div>
            </div>
       </div>
       
      
    </div>
    
    
    
    
    <div class="w-full bg-white flex h-full justify-center items-center h-4/6">


        <div class="flex w-full h-full bg-transparent mt-8">

            <div class="w-1/6 h-full flex-nowrap bg-transparent items-center"> 
            
                <div class="w-full h-2/6 bg-transparent flex justify-end items-start"> 
                    <img class="object-fill w-24 h-24" src="{{ asset('storage/student1.jfif') }}" alt="description of myimage"> 
                </div>

                
                <div class="w-full h-4/6 bg-white flex justify-end items-end"> 

                    <a href="{{ url()->previous() }}">  <button class="bg-green-300 px-12 py-1 text-white font-bold mr-3 mb-3"> Back </button> </a>

                </div>

            </div>
            
            <div class="w-2/6 h-full flex-nowrap bg-transparent items-center"> 
            
                <div class="bg-transparent ml-2 w-full h-2/6 flex-nowrap">  

                    <div class="bg-transparent h-1/3 flex items-end font-bold text-lg"> @foreach ($SelectedStudent as $Student) {{$Student->firstname}} {{$Student->lastname}} @endforeach</div>
                    <div class="bg-transparent h-1/3 flex items-center"> @if ($Student->course_id == 9) Bachelor of Science in Computer Science - {{$Student->year}} @endif </div>
                    <div class="bg-transparent h-1/3"> 2014-000{{$Student->id}}</div>

                </div>


                <div class="bg-white h-4/6 flex flex-wrap">  
                @foreach ($NASSurveyQuestions as $NASSurveyQuestion) 
                    <div class="w-full h-2/6 flex flex-wrap"> Module {{$NASSurveyQuestion->id }}: 
            
                                           
                            {{$NASSurveyQuestion->question }} - 
                            
                            @foreach($StudentNASAnswers as $StudentNASAnswer) 
                                @if($StudentNASAnswer->survey_question_id == $NASSurveyQuestion->id)
                                 {{$StudentNASAnswer->answer}} 
                                    @foreach($StudentAnswerChoices as $StudentAnswerChoice)
                                        @if($StudentAnswerChoice->survey_response_answer_id == $StudentNASAnswer->id)
                                            {{$StudentNASAnswer->answer}}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                          
                        </div>



                  
                @endforeach 
                </div>

            </div>  

            <div class="w-3/6 h-full flex-nowrap bg-white"> 
            
                <div class="bg-transparent h-2/6 flex justify-end"> 
                   <div> <button class="bg-gray-900 px-10 py-2 text-white font-bold mr-3 mt-3"> Print </button>  </div>
                </div>

                <div class="bg-transparent h-4/6 flex-nowrap"> 

                    <div> Module 4: NULL <br> <br> </div>
                    <div> Module 5: <br> Parents <br>  </div>
                    <div class="bg-white mt-2"> Module 6: <br> Never <br> Always  Oftentimes <br> Never <br> Sometimes </div>

                </div>

            </div>

                 

        </div>
    

        
    </div>



</div>
        
</x-layout>