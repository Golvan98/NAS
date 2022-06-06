<x-layout>



<form method="POST" action="/sessionlogin" class="px-6 py-4 rounded-xl text-black">
                            @csrf
                            <header class="flex items-center justify-center">
                                <h5 class="my-1 text-black"></h5>
                            </header>
                                             
                         <label class=""
		            for="firstname"
	                >
	                try daw ang editor @foreach($surveyquestion as $questionz)
					{{$questionz->question}}
					@endforeach
	                </label>

	                <input class="border border-gray-400 p-0.5 w-full"
			        type="text"
			        name="firstname"
			        id="firstname"
		        	required
			        >
                    <br>
                    
                                       
                        <div class="flex justify-center">
                        <button type="submit" class="bg-black justify-center rounded-full text-xs font-semibold text-white uppercase py-2 px-3"> Login </button>
                        
                        </div>
                          
</form>




</x-layout>