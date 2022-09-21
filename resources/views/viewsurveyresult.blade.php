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
        <a href="/studentlist/{{$questioncategory}}"> {{ $questioncategory }} </a>
           
        </div>

        


        <div class="w-full h-full">
            <table class="mx-auto items-center text-center justify-center">
            @foreach ($CCSPrograms as $CCSProgram) 
                <tr>
                  <th class="text-left border border-black px-2"> <a href="/studentlist/{{$CCSProgram->id}}/{{$questioncategory}}"> {{$CCSProgram->coursename}} </th> </a>
            


                        <th class="border border-black px-2"> 
                          @if($CCSProgram->coursecode =="BSCA") 
                            @if($questioncategory == "Motivation") 
                               {{ $LackofMotivationCAStudentsCount}}  
                            @endif 
                            @if($questioncategory == "Anxiety") 
                                {{$AnxiousCAStudentsCount}} 
                            @endif 
                            @if($questioncategory == "Relationships") 
                               {{ $RelationshipProblemCAStudentsCount }}
                            @endif 
                            @if($questioncategory == "Stress-Management") 
                               {{ $StressProblemCAStudentsCount }}
                            @endif 
                            @if($questioncategory == "Student-Teacher-Conflict") 
                              {{  $StudentTeacherCAStudentsCount }}
                            @endif 
                            @if($questioncategory == "Self-Image") 
                              {{  $SelfImageCAStudentsCount }}
                            @endif 
                            @if($questioncategory == "Bullying") 
                              {{  $BulliedCAStudentsCount }}
                            @endif 
                            @if($questioncategory == "Peer Pressure") 
                               {{  $PeerPressuredCAStudentsCount }}
                            @endif 
                          @endif 
                          
                          
                          @if($CCSProgram->coursecode =="BSCS")
                            @if($questioncategory == "Motivation") 
                               {{ $LackofMotivationComSciStudentsCount}}  
                            @endif 
                            @if($questioncategory == "Anxiety") 
                                {{$AnxiousComSciStudentsCount}} 
                            @endif 
                            @if($questioncategory == "Relationships") 
                               {{ $RelationshipProblemComSciStudentsCount }}
                            @endif 
                            @if($questioncategory == "Stress-Management") 
                               {{ $StressProblemComSciStudentsCount }}
                            @endif 
                            @if($questioncategory == "Student-Teacher-Conflict") 
                              {{  $StudentTeacherComSciStudentsCount }}
                            @endif 
                            @if($questioncategory == "Self-Image") 
                              {{  $SelfImageComSciStudentsCount }}
                            @endif 
                            @if($questioncategory == "Bullying") 
                              {{  $BulliedComSciStudentsCount }}
                            @endif 
                            @if($questioncategory == "Peer Pressure") 
                               {{  $PeerPressuredComSciStudentsCount }}
                            @endif 
                          @endif
                         
                          @if($CCSProgram->coursecode =="BSIT")
                            @if($questioncategory == "Motivation") 
                               {{ $LackofMotivationITStudentsCount}}  
                            @endif 
                            @if($questioncategory == "Anxiety") 
                                {{ $AnxiousITStudentsCount }} 
                            @endif 
                            @if($questioncategory == "Relationships") 
                               {{ $RelationshipProblemITStudentsCount }}
                            @endif 
                            @if($questioncategory == "Stress-Management") 
                               {{ $StressProblemITStudentsCount }}
                            @endif 
                            @if($questioncategory == "Student-Teacher-Conflict") 
                              {{  $StudentTeacherITStudentsCount }}
                            @endif 
                            @if($questioncategory == "Self-Image") 
                              {{  $SelfImageITStudentsCount }} 
                            @endif 
                            @if($questioncategory == "Bullying") 
                              {{  $BulliedITStudentsCount }}
                            @endif 
                            @if($questioncategory == "Peer Pressure") 
                               {{  $PeerPressuredITStudentsCount }}
                            @endif 
                          @endif
                        
                          @if($CCSProgram->coursecode == "BSIS")
                            @if($questioncategory == "Motivation") 
                                {{ $LackofMotivationISStudentsCount}}  
                              @endif 
                              @if($questioncategory == "Anxiety") 
                                  {{$AnxiousISStudentsCount}} 
                              @endif 
                              @if($questioncategory == "Relationships") 
                                {{ $RelationshipProblemISStudentsCount }}
                              @endif 
                              @if($questioncategory == "Stress-Management") 
                                {{ $StressProblemISStudentsCount }}
                              @endif 
                              @if($questioncategory == "Student-Teacher-Conflict") 
                                {{  $StudentTeacherISStudentsCount }}
                              @endif 
                              @if($questioncategory == "Self-Image") 
                                {{  $SelfImageISStudentsCount }} 
                              @endif 
                              @if($questioncategory == "Bullying") 
                                {{  $BulliedISStudentsCount }}
                              @endif 
                              @if($questioncategory == "Peer Pressure") 
                                {{  $PeerPressuredISStudentsCount }}
                              @endif 
                            @endif


                        </th>

                        
                </tr>

                
                @endforeach

              

                <tr>
                    <th class="border border-black px-2 text-left"> TOTAL </th>

                        <th class="border border-black px-2"> 
                            @if($questioncategory == "Motivation") 
                               {{ $LackOfMotivationCCSStudentsCount}}  
                            @endif 
                            @if($questioncategory == "Anxiety") 
                              {{  $AnxiousCCSStudentsCount}} 
                            @endif 
                            @if($questioncategory == "Relationships") 
                               {{ $RelationshipProblemCCSStudentsCount }}
                            @endif 
                            @if($questioncategory == "Stress-Management") 
                               {{ $StressCCSStudentsCount }}
                            @endif 
                            @if($questioncategory == "Student-Teacher-Conflict") 
                              {{  $StudentTeacherCCSStudentsCount }}
                            @endif 
                            @if($questioncategory == "Self-Image") 
                              {{  $SelfImageCCSStudentsCount }}
                            @endif 
                            @if($questioncategory == "Bullying") 
                              {{  $BulliedCCSStudentsCount }}
                            @endif 
                            @if($questioncategory == "Peer Pressure") 
                               {{  $PeerPressuredCCSStudentsCount }}
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
                  <a href="/piechart/{{$questioncategory}}">  <button class="text-white place-content-end place-items-end text-end justify-end w-24 h-8 bg-blue-400 mr-4">
                        View Graph
                    </button>
                  </a>
                </div>

            </div>
        </div>
    </div>



</div>
















</x-categoryresultlayout>