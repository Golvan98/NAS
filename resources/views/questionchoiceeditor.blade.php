<x-layout>




<div class="w-full h-full bg-gray-300 flex justify-center items-center">

    
    <div class="w-3/4 bg-gray-100 border border-black mt-16 mb-12">
        
        


          
            @foreach($QuestionChoices as $QuestionChoice)
            
            <div class="w-full flex justify-between mt-4">

             <div class="w-1/3 text-center"> <a href="#"> <button class="bg-gray-300 px-4 py-1 rounded-xl">   {{ $QuestionChoice->question_choice }}  </button> </a> </div>
             <div class="w-1/3 text-center"> <a href="/questionchoiceedit/{{$QuestionChoice->id}}"> <button class="bg-gray-300 px-4 py-1 rounded-xl">   Edit  </button> </a> </div>
             <div class="w-1/3 text-center"> <a href="#"> <button class="bg-red-300 px-4 py-1 rounded-xl">   Delete </button> </a> </div> 
                          
            </div>
            @endforeach


            

            <div class="w-full h-full flex flexitems-end mt-6 mr-2"> 

            <div class=""> <a href="#"> <button class="px-8 py-2 bg-red-500 rounded-xl ml-2 mb-2"> Back </button> </a> </div> 
            
            </div>

            
            <div class="w-full h-full flex items-end mt-6 mr-2"> 

              <div class="w-full bg-gray-300"> {{$QuestionChoices->links()}} </div>

            </div>




                                           

    </div>
    
    
</div>

</x-layout>