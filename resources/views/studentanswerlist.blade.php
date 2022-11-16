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
            
            <div class="w-full h-full flex-nowrap bg-transparent items-center"> 
            
                <div class="bg-transparent w-full h-1/4 flex-nowrap ">  

                    <div class="bg-transparent w-full h-1/4 flex justify-between font-bold text-lg"> 
                        <div> &nbsp @foreach ($SelectedStudent as $Student) {{$Student->firstname}} {{$Student->lastname}} @endforeach </div>
                        <div> <button class="bg-gray-700 text-white font-bold px-10 py-2 mr-4"> Print </button> </div>

                    </div>
                    <div class="bg-transparent h-1/4 flex items-center">&nbsp  @if ($Student->course_id == 9) Bachelor of Science in Computer Science - {{$Student->year}} @endif </div>
                    <div class="bg-transparent h-1/4"> &nbsp 2014-000{{$Student->id}}</div>

                </div>


                <div class="bg-white w-full h-3/4 flex flex-wrap">  
                @foreach ($NASSurveyQuestions as $NASSurveyQuestion) 
                    <div class="w-1/2 h-auto flex flex-wrap"><strong> Module {{$NASSurveyQuestion->id }}: &nbsp </strong>
            
                            @foreach($StudentNASAnswers as $StudentNASAnswer) 
                                @if($StudentNASAnswer->survey_question_id == $NASSurveyQuestion->id)
                                <div class="w-1/2 flex flex-wrap"> {{$StudentNASAnswer->answer}} </div> 
                                    @foreach($StudentAnswerChoices as $StudentAnswerChoice)
                                        @if($StudentAnswerChoice->survey_response_answer_id == $StudentNASAnswer->id)
                                        <br> <div class="w-1/2 flex flex-wrap"> <strong> ✔ </strong> {{$StudentAnswerChoice->answer_choice}} </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                          
                    </div>


                  
                  
                @endforeach 

                {{$NASSurveyQuestions->links()}}
                </div>

            </div>  

            

                 

        </div>
    

        
    </div>



</div>
        
</x-layout>