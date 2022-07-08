<x-layout>




<div class="w-full bg-gray-300 flex justify-center items-center">

    
    <div class="w-3/4 h-3/4 bg-gray-500 items-center border border-black">
        
        


          
            @foreach($QuestionChoices as $QuestionChoice)
            
            <div class="w-full flex justify-between mt-2">

             <div class="w-1/3 text-center"> <button class="bg-gray-300 px-4 py-1 rounded-xl">   {{ $QuestionChoice->question_choice }}  </button> </div>
             <div class="w-1/3 text-center"><button class="bg-gray-300 px-4 py-1 rounded-xl">   Edit  </button> </div>
             <div class="w-1/3 text-center"><button class="bg-gray-300 px-4 py-1 rounded-xl">   Delete </button> </div> 

             
             
            </div>
            @endforeach


            

            <div class=" w-full h-1/2 flex items-end mt-6"> 

              <div class="w-full bg-gray-300"> {{$QuestionChoices->links()}} </div>

            </div>




          
            
            
         

    </div>
    
    
</div>

</x-layout>