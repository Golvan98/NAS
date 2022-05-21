<x-layout>




<div id="body" class="bg-gray-300 flex-auto"> 

    <div class="bg-gray-500 mt-16">     

    
        <article class="bg-gray-300 flex-auto text-black font-bold py-3"> &nbsp &nbsp &nbsp  Which survey would you like to view?
            <div class="mt-2 border border-red-500"></div>
        
        </article>

    </div>


    <article class="bg-white">
      
    <div class="bg-gray-100 border border-black mt-2 ">
        <table class="mx-auto mt-2">
              
               
                
                <tr class="space-x-4">

                <th> <a href="/surveyresults"> <button  class="w-48 h-12 bg-gray-500 ml-2 mr-12 rounded-xl border border-black mt-2"> All Surveys </th> </a>

                @foreach($surveys as $survey)  
                               
                    
                                 
                <th> <a href="/viewsurvey/{{$survey->name}}"> <button  class="w-48 h-12 bg-gray-300 ml-2 mr-12 rounded-xl border border-black mt-2"> {{$survey->name}}	</th> </a>
                @if($loop->iteration %4 ==0)
                <tr>
                    @else
                    

                    @endif
                                        
                    
                @endforeach
                   
            
            
       

                </tr>

        </table>
        <br>
        <a href="{{ url()->previous() }}"> <button class="ml-8 w-24 h-6 bg-green-500 text-white font-bold mb-2 "> Get Back </button>
    </div>

    </article>

    

</div>














</x-layout>
