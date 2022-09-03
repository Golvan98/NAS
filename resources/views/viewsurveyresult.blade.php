<x-categoryresultlayout>


<div id="body" class="bg-gray-300 flex-nowrap w-full"> 

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

        <div class="text-center font-bold mr-2 mt-12"> 
            College of Computer Studies
                
        </div>
        <div class="text-center  mr-2"> 
           @if($questioncategory == "Motivation")
           yewe
           @endif
           
        </div>

        @php  $BSIT = App\Models\Course::all()->where('coursecode', '=', 'BSIT')->pluck('id');
              $BSITcount = App\Models\Student::all()->whereIn('course_id', $BSIT)->count();
        @endphp 


        <div class="w-full h-full">
            <table class="mx-auto items-center text-center justify-center">

                <tr>
                    <th class="text-left border border-black px-2"> BS Computer Applications </th>

                        <th class="border border-black px-2"> {{$BSCAcount}} </th>
                </tr>

                <tr>
                    <a href="/studentlist"> <th class="text-left border border-black px-2"> BS Computer Science </th> </a>

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

                        <th class="border border-black px-2"> 
                            @if($questioncategory == "Motivation") 
                               {{ $LackOfMotivationCCSStudents}}
                            @endif 
                            @if($questioncategory == "Anxiety") 
                              {{  $AnxiousCCSStudents}}
                            @endif 
                            @if($questioncategory == "Relationships") 
                               {{ $RelationshipProblemCCSStudents }}
                            @endif 
                            @if($questioncategory == "Stress-Management") 
                               {{ $StressCCSStudents }}
                            @endif 
                            @if($questioncategory == "Student-Teacher-Conflict") 
                              {{  $StudentTeacherCCSStudents }}
                            @endif 
                            @if($questioncategory == "Self-Image") 
                              {{  $SelfImageCCSStudents }}
                            @endif 
                            @if($questioncategory == "Bullying") 
                              {{  $BulliedCCSStudents }}
                            @endif 
                            @if($questioncategory == "Peer Pressure") 
                               {{  $PeerPressuredCCSStudents }}
                            @endif 
                            

                        </th>
                </tr>
                
            </table>
            <br>
            <br>

            <div class="mr-2 flex justify-between"> 

                <div>
                  <a href="{{ url()->previous() }}">
                    <button class="text-white place-content-end place-items-end text-end justify-end w-24 h-8 bg-green-400 ml-2">
                        Back
                    </button>
                  </a>
                </div>

                <div>
                  <a href="/piechart">  <button class="text-white place-content-end place-items-end text-end justify-end w-24 h-8 bg-blue-400 mr-4">
                        View Graph
                    </button>
                  </a>
                </div>

            </div>
        </div>
    </div>



</div>
















</x-categoryresultlayout>