<x-layout>
        

    @if($SurveyQuestion->type =='multiplechoice')

    
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12"> <strong> Good Day, Counselor! Welcome {{ auth()->user()->firstname }} !  </strong> </div>
        </div>


  <div class="flex justify-center w-full h-3/4 bg-white border border-border-black"> 
  <div class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-gray-300 border border-black">  
        @csrf @method('POST')  
        
 
     <div class="flex-nowrap bg-transparent w-full h-5/6">
        <table>

       <tr>
        <div class="flex justify-center items-center bg-transparent w-full h-auto h-1/6"> {{$SurveyQuestion->question}} (Multiple Choice) </div>

        <div class="flex bg-transparent h-1/6"> 

          @foreach($choices as $choice)
          <div class="flex justify-center items-center bg-transparent px-4 py-1 w-1/3 h-auto bg-gray-300"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}">  &nbsp {{$choice->question_choice}} </div> 
          
          @if($loop->iteration %5 ==0)
        </div>

        <div class="flex bg-transparent h-1/6 mt-0.5"> 
          
        
          @endif
          
          @endforeach          
        </div>  
          
        </table>
     </div>

        <div class="flex justify-between w-full h-1/6 bg-transparent items-center">

                <div> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-2 bg-green-300 rounded-xl"> Back </button> </a>  </div> 
                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  
                <div> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-2 bg-green-500 rounded-xl"> Edit Choices </button> </div> 
                
        </div>
         
         <div class="mt-1"> wait sa ha </div>

 
  </div>
  </div>
       
</div>

         

    @endif
                

     @if($SurveyQuestion->type =='likertscale')
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12">Good Day, Counselor! </div>
        </div>


  <div class="flex justify-center w-full h-3/4 bg-white border border-green-500"> 
  <div class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-gray-300 border border-green-500">  
        @csrf @method('POST')  

 
     <div class="flex-nowrap bg-gray-300 w-full h-2/6">
        <table>

       <tr>
        <div class="flex justify-center items-center bg-gray-300 w-full h-full"> <strong> {{$SurveyQuestion->question}} (Likert Scale) </strong> </div>

        <div class="flex bg-gray-300 h-full"> 

          @foreach($choices as $choice)
          <div class="flex justify-center items-center bg-gray-300 px-4 py-1 w-1/3 h-full border border-black"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 
          @endforeach 

        </div>  
          
        </table>
     </div>

        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white ">

                <div> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-2 bg-green-300 rounded-xl"> Back </button> </a>  </div> 
                
                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  
                
                <div> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-2 bg-green-500 rounded-xl"> Edit Choices </button> </div> 
                
        </div>
         
        

        <div class="items-end my-0.5"> wait sa ha  </div>

  </div> 
</div>
       
</div> 	
        @endif

        @if($SurveyQuestion->type =='ratingscale')
     
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12">Good Day, Counselor! </div>
        </div>


  <div class="flex justify-center w-full h-3/4 bg-white border border-green-500"> 
  <div class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-gray-300 border border-green-500">  
        @csrf @method('POST')  

 
     <div class="flex-nowrap bg-gray-300 w-full h-2/6">
        <table>

       <tr>
        <div class="flex justify-center items-center bg-gray-300 w-full h-full"> <strong> {{$SurveyQuestion->question}} (Rating Scale) </strong> </div>

        <div class="flex bg-gray-300 h-full"> 

          @foreach($choices as $choice)
          <div class="flex justify-center items-center bg-gray-300 px-2 py-1 w-1/3 h-full border border-black"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp {{$choice->question_choice}} </div> 
          @endforeach 

        </div>  
          
        </table>
     </div>

        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white ">

                <div> <a href="/questionlist/{{$survey->id}}"> <button class="mb-2 ml-2 px-8 py-2 bg-green-300 rounded-xl"> Back </button> </a>  </div> 
                
                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  
                
                <div> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-2 bg-green-500 rounded-xl"> Edit Choices </button> </div> 
                
        </div>
         
        

        <div class="items-end my-0.5"> wait sa ha </div>

  </div>
        
  </div>
       
</div> 	

        @endif
       


        @if($SurveyQuestion->type =='matrixquestion')
        
        
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12">Good Day, Counselor! </div>
        </div>


  <div class="flex justify-center w-full h-3/4 bg-white border border-black"> 
  <div class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-gray-300 border border-black">  
        
  @csrf @method('POST')  

 
     <div class="flex-nowrap bg-gray-300 w-full h-2/6">
        <table>

       <tr>
        <div class="flex justify-center items-center bg-gray-300 w-full h-full"> <strong> {{$SurveyQuestion->question}} (Matrix Question) </strong> </div>

        <div class="flex bg-gray-300 h-full"> 

          @foreach($choices as $choice)
          <div class="flex justify-center items-center bg-gray-300 px-2 py-1 w-1/3 h-full border border-black"> <input type="checkbox" name="question_choice[]" id="question_choice[]" value="{{$choice->question_choice}}"> &nbsp  {{$choice->question_choice}} </div> 
          @endforeach 

        </div>  
          
        </table>
     </div>

        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white">

                <div> <a href="/questionlist/{{$survey->id}}"> <button class="ml-2 mb-2 px-8 py-2 bg-green-300 rounded-xl"> Back </button> </a>  </div> 
                
                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  
                
                <div> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class="mb-2 px-8 py-2 bg-green-500 rounded-xl"> Edit Choices </button> </div> 
                
        </div>
         
        

        <div class="items-end my-0.5"> wait sa ha </div>

  </div> 
  </div>
       
</div> 	


        @endif

        @if($SurveyQuestion->type =='openended')
        
<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
                <div class="ml-12">Good Day, Counselor! </div>
        </div>


  <div class="flex justify-center w-full h-3/4 bg-gray-300 border border-green-500"> 
  <div class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-white border border-green-500">  
        @csrf @method('POST')  

 
   <div class="flex-nowrap bg-gray-300 w-full h-2/6">
        <table>

        <tr>
                <div class="flex justify-center items-center bg-gray-300 w-full h-full"> <strong> {{$SurveyQuestion->question}} Open Ended  wtf</strong> </div>

                <div class="flex bg-gray-300 h-full"> 

                
                <input class="mx-2 bg-gray-300 w-full h-full"  type="text" name="answer" id="answer" placeholder="Answer Here" value="{{old('answer')}}"> 
                

                </div>  
                
        </table>
        </div>

        <div class="flex justify-between w-full h-4/6 bg-gray-300 items-end text-white ">

                <div> <a href="/questionlist/{{$survey->id}}"> <button class="ml-2 mb-2 px-8 py-2 bg-green-300 rounded-xl"> Back </button> </a>  </div> 
                
                <x-testmodal SurveyQuestionId="{{$SurveyQuestion->id}}" SurveyQuestionName="{{$SurveyQuestion->question}}" SurveyQuestionCategory="{{$SurveyQuestion->category}}" SurveyQuestionType="{{$SurveyQuestion->type}}"> </x-testmodal>  
                
                <div> <a href="/questionchoiceeditor/{{$SurveyQuestion->id}}"> <button type="submit" class=" mb-2 px-8 py-2 bg-green-500 rounded-xl"> Edit Choices </button> </div> 
                
        </div>
         
        

        <div class="items-end my-0.5"> wait sa ha  </div>

  </div>      
  </div>
       
</div> 	

        @endif

      
                       
    
</x-layout>