<x-adminhomelayout>







<form method="POST" action="/createquestion/{{$survey->id}}" class="px-6 py-4 rounded-xl text-black">
                            @csrf
							
                         
                                            
	                try daw ang <strong> Creator </strong> 

	                <input class="border border-gray-400 p-0.5 w-full"
			        type="text"
			        name="question"
			        id="question"
		        	required
			        >
                    <br>
                    
                                       
                        <div class="flex justify-center">
                        <button type="submit" class="bg-black justify-center rounded-full text-xs font-semibold text-white uppercase py-2 px-3"> Create </button>
                        
                        </div>
                          
</form>



</x-adminhomelayout>