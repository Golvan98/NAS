<x-layout>




<div class="w-full bg-gray-300 flex justify-center items-center">

    
    <div class="w-3/4 h-3/4 bg-gray-500 items-center border border-black">
        
        <table>
          <tr>
            @foreach($QuestionChoices as $QuestionChoice)
            <div class="w-full flex justify-between mt-2">

             <div class=" bg-gray-300 border border-black"> <button class="px-8 py-2 bg-gray-500"> {{ $QuestionChoice->question_choice }}  </button> </div>
             <div class="justify-center bg-gray-300 border border-black"> <button class="px-8 py-2 bg-gray-500"> Edit  </button> </div>
             <div class="bg-gray-300 border border-black"> <button class="px-8 py-2 bg-red-300"> Delete </button> </div> 

             
             
            </div>
            @endforeach


            

            <div class=" w-full h-1/2 flex items-end mt-5"> 

              <div class="w-full bg-gray-300"> {{$QuestionChoices->links()}} </div>

            </div>




          
            
            
          </tr>   
        </table>

    </div>
    
    
</div>

</x-layout>