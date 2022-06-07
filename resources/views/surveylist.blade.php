<x-layout>


<div id="body" class="bg-gray-300 flex-auto my-auto "> 


    <article class="bg-gray-500 flex">     

    <article class="flex-auto bg-gray-300 flex-auto font-bold border border-red-500">


        

         <div class=" ml-4 pr-48 border border-green-500 place-content-center place-items-center place-self-center">
         

            <div class="text-white  bg-gray-500 justify-items-center grid place-items-center">
                                All Surveys
            <table class="text-black grid place-items-center m-2 text-center text-left mt-8 border border-black mb-4 ">

         @foreach($surveys as $survey)
            <tr>              
            <th class="whitespace-pre px-24 py-4"> {{$survey->name}} </th>  
            <th class="whitespace-pre px-24 py-4"> <a href="/questionlist/{{$survey->id}}"> <button class="bg-gray-300 rounded-xl py-2"> Edit Questions </th> </button> </a>
            <th class="whitespace-pre px-24 py-4"> <a href="/questioncreator/{{$survey->id}}"> <button type="submit" class="bg-gray-300 rounded-xl py-2"> Create Survey Question </th> </button> </a> 
            <th class=""> 
            <form method="POST" class="border border-green-500 mr-12" action="/deletesurvey/{{$survey->id}}">
             @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-300 rounded-xl py-2"> Delete Survey </th> </button> </form> 
           
            </tr> 
            @endforeach   
            </table>
            </div>

         </div>

        
            
        </article>
       
       
    </article>
        
      

    

</div>





</x-layout>