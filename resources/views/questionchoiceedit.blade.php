<x-adminhomelayout>




<div class="w-full bg-gray-300 flex justify-center items-center">


    <div class="w-1/2 h-1/2 bg-gray-300 flex justify-center items-center border border-black">



             

            <form class="flex-nowrap justify-center items-center w-full h-1/2 bg-gray-500" method="POST"  action="/updatequestionchoice/{{$QuestionChoice->id}}">  
                @csrf
                @method('PATCH')
                    <div class="flex justify-center items-center w-full h-3/4 bg-gray-500">    
                    <input class="border border-black w-1/2 bg-white text-black font-bold" 
                    type="text"
			        name="question_choice"
			        id="question_choice"
		        	required               
                    placeholder="{{$QuestionChoice->question_choice}}"> 
                    </div> 

                    <div class="flex justify-between px-12 py-0.5 mt-2 h-1/4 bg-gray-300"> 
                      <button class="bg-red-500 px-4 py-0.5 text-white text-center items-center flex justify-center"> <a href="/questionchoiceeditor/{{$QuestionChoice->survey_question_id}}">   Back </button> </a>

                    <button type="submit" class="bg-amber-900 px-4 py-0.5 text-white text-center items-center flex justify-center"> Submit </button> </a>
                    </div> 
            
            </form> 
             




    </div>


</div>











</x-adminhomelayout>