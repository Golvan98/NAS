<x-layout>




<div id="body" class="bg-gray-300 w-full"> 

    <div class="bg-gray-500 mt-16 ">     

    
        <article class="bg-gray-300 w-full text-black font-bold py-3"> &nbsp &nbsp &nbsp  Which survey would you like to view?
            
            <div class="mt-2 border border-red-500"></div>
        
        </article>

    </div>


    <div class="flex-nowrap w-full bg-gray-300 h-auto border border-black">

        <div class="w-full bg-gray-300 space-x-12 mt-2 flex justify-between items-center h-auto px-24 py-8">


            <div class="w-full flex justify-between items-center h-auto bg-gray-300">  

                @foreach($surveys as $survey)  
                                                    
                <div class="w-auto bg-gray-300"> 

                    <button class="w-32 h-12 bg-gray-400 rounded-xs"> {{$survey->name}} </button> 
            
                </div>

                @endforeach
            
            </div>


        </div>
        
        <div class="w-full flex justify-start h-auto bg-gray-300">  <a href="{{ url()->previous() }}"> <button class="text-center bg-green-500 px-9 py-1 text-white font-bold ml-8 mb-2 "> Back </button> </a> </div>

    </div>

    

</div>














</x-layout>
