<x-layout>


<div id="body" class="bg-gray-300 flex-auto"> 

    <div class="bg-gray-500 mt-16">     

    
        <article class="bg-gray-300 flex-auto text-black font-bold py-3"> &nbsp &nbsp &nbsp  Good Evening, Counselor!
            <div class="">    </div>
            <div class="mt-2 border border-red-500"></div>
        
        </article>

    </div>

    <div>
        
        <div class="text-right mr-2"> 
            <button class="text-white place-content-end place-items-end text-end justify-end w-24 h-8 bg-gray-700 mr-2">
                Print
            </button>
        </div>

        <div class="text-center font-bold mr-2"> 
            College of Computer Studies
                
        </div>
        <div class="text-center  mr-2"> 
            {{$questioncategory}}
        </div>

        @php  $BSIT = App\Models\Course::all()->where('coursecode', '=', 'BSIT')->pluck('id');
              $BSITcount = App\Models\Student::all()->whereIn('course_id', $BSIT)->count();
        @endphp 


        <div>
            <table class="mx-auto items-center text-center justify-center">

                <tr>
                    <th class="text-left border border-black px-2"> BS Computer Applications </th>

                        <th class="border border-black px-2"> {{$BSCAcount}} </th>
                </tr>

                <tr>
                    <th class="text-left border border-black px-2"> BS Computer Science </th>

                        <th class="border border-black px-2"> {{$BSCScount}} </th>
                </tr>

                <tr>
                    <th class="text-left border border-black px-2"> BS Information Technology </th>
                   
                        <th class="border border-black px-2"> 
                           
                        {{$BSITcount}} </th>
                </tr>
                
                <tr>
                    <th class="text-left border border-black px-2"> BS Information Systems </th>

                        <th class="border border-black px-2"> 31 </th>
                </tr>

                <tr>
                    <th class="border border-black px-2 text-left"> TOTAL </th>

                        <th class="border border-black px-2"> 31 </th>
                </tr>

            </table>
            <br>
            <br>
            <a href="{{ url()->previous() }}"> <button class="bg-green-500 rounded-bl text-white ml-8 px-2"> Get Back </button> </a>
        </div>
    </div>



</div>
















</x-layout>