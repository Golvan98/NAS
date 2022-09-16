<x-layout>

<div id="main" class="flex-nowrap w-full full bg-gray-300 b">


    <div class="w-full bg-white flex h-1/6 justify-center items-end  ">
        
       <div class="w-full flex-nowrap">
        
            <div class="w-full flex justify-center items-end"> 
                <div class="w-4/5 text-lg"> <strong> Good Evening, Counselor! </strong> </div>
            </div>

            <div class="w-full flex justify-center"> 
                <div class="w-full h-0.5 bg-red-500 mx-2">  </div>
            </div>
       </div>
       
      
    </div>
    
    
    
    
    <div class="w-full bg-white h-full flex justify-center items-center h-4/6">


        <div class="flex w-full h-full bg-white mt-8">

            <div class="w-1/6 h-full flex justify-start items-start"> 
            
                <div> 

                    <a href="{{ url()->previous() }}"> <button class="mt-4 bg-green-400 text-white font-bold px-10 py-1 ml-4 mb-2"> Return to Graphs </button> </a>

                </div>

            </div>

            <div class="w-4/6 h-full bg-white items-center"> 
            
                <div class="flex-nowrap w-full h-full bg-white"> 
        
                   <div class="flex-nowrap h-1/6"> 

                   @foreach($CCSCollege as $CCS) <div class="flex justify-center items-center h-2/3 text-lg font-bold"> <a href="/collegestudentlist/{{$CCS->collegecode}}/{{$questioncategory}}">  {{$CCS->collegecode}} @endforeach School of Computer Studies </a> </div>
                        <div class="flex justify-center h-1/3 items-start text-lg">

                            {{$questioncategory}} 

                      



                        </div>

                   </div>

                   <div class="flex-nowrap items-start h-5/6"> 

                        <div class="flex justify-center text-lg font-bold mt-2"> 
                        @foreach ($CCScourse as $course) 
                            
                        
                        <select name="formal" selected="{{$course->id}}" onchange="javascript:handleSelect(this)">

                        @foreach($CCSCourses as $test) 
                        <option value="/studentlist/{{$test}}/{{$questioncategory}}" selected>
                            
                        
                            @if($test ==7) Bachelor of Science in Information Systems  @endif
                            
                            @if($test ==8) Bachelor of Science in Computer Applications @endif
                            
                            @if($test ==9) Bachelor of Science in Computer Science @endif
                            
                            @if($test ==10) Bachelor of Science in Information Technology @endif
                        </option> 
                        @endforeach
                        
                        </select>
                        
                        
                        
                        </div> 
                        @endforeach

                       <script type="text/javascript">
                        function handleSelect(elm)
                        {
                            window.location = elm.value+"";
                        }
                        </script>
                                            
                        
                             <div class="flex justify-center"> 
                                <button>  

                                

                                    @if($questioncategory == "Motivation") 

                                        @if($course->id == 7)
                                            @foreach($LackOfMotivationISStudents as $LackOfMotivationISStudent)
                                            <a href="/studentanswerlist/{{$LackOfMotivationISStudent->id}}">2014-{{$LackOfMotivationISStudent->id}} | {{$LackOfMotivationISStudent->firstname}} {{$LackOfMotivationISStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 8)
                                            @foreach($LackOfMotivationCAStudents as $LackOfMotivationCAStudent)
                                            <a href="/studentanswerlist/{{$LackOfMotivationCAStudent->id}}">2014-{{$LackOfMotivationCAStudent->id}} | {{$LackOfMotivationCAStudent->firstname}} {{$LackOfMotivationCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($LackOfMotivationComSciStudents as $LackOfMotivationComSciStudent)
                                            <a href="/studentanswerlist/{{$LackOfMotivationComSciStudent->id}}">2014-{{$LackOfMotivationComSciStudent->id}} | {{$LackOfMotivationComSciStudent->firstname}} {{$LackOfMotivationComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($LackOfMotivationITStudents as $LackOfMotivationITStudent)
                                            <a href="/studentanswerlist/{{$LackOfMotivationITStudent->id}}">2014-{{$LackOfMotivationITStudent->id}} | {{$LackOfMotivationITStudent->firstname}} {{$LackOfMotivationITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                    @endif 

                                    @if($questioncategory == "Anxiety") 


                                        @if($course->id == 7)
                                            @foreach($AnxiousISStudents as $AnxiousISStudent)
                                            <a href="/studentanswerlist/{{$AnxiousISStudent->id}}">2014-{{$AnxiousISStudent->id}} | {{$AnxiousISStudent->firstname}} {{$AnxiousISStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 8)
                                            @foreach($AnxiousCAStudents as $AnxiousCAStudent)
                                            <a href="/studentanswerlist/{{$AnxiousCAStudent->id}}">2014-{{$AnxiousCAStudent->id}} | {{$AnxiousCAStudent->firstname}} {{$AnxiousCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($AnxiousComSciStudents as $AnxiousComSciStudent)
                                            <a href="/studentanswerlist/{{$AnxiousComSciStudent->id}}">2014-{{$AnxiousComSciStudent->id}} | {{$AnxiousComSciStudent->firstname}} {{$AnxiousComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($AnxiousITStudents as $AnxiousITStudent)
                                            <a href="/studentanswerlist/{{$AnxiousITStudent->id}}">2014-{{$AnxiousITStudent->id}} | {{$AnxiousITStudent->firstname}} {{$AnxiousITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif


                                    @endif 

                                    @if($questioncategory == "Relationships") 


                                        @if($course->id == 7)
                                            @foreach($RelationshipProblemISStudents as $RelationshipProblemISStudent)
                                            <a href="/studentanswerlist/{{$RelationshipProblemISStudent->id}}">2014-{{$RelationshipProblemISStudent->id}} | {{$RelationshipProblemISStudent->firstname}} {{$RelationshipProblemISStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 8)
                                            @foreach($RelationshipProblemCAStudents as $RelationshipProblemCAStudent)
                                            <a href="/studentanswerlist/{{$RelationshipProblemCAStudent->id}}">2014-{{$RelationshipProblemCAStudent->id}} | {{$RelationshipProblemCAStudent->firstname}} {{$RelationshipProblemCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($RelationshipProblemComSciStudents as $RelationshipProblemComSciStudent)
                                            <a href="/studentanswerlist/{{$RelationshipProblemComSciStudent->id}}">2014-{{$RelationshipProblemComSciStudent->id}} | {{$RelationshipProblemComSciStudent->firstname}} {{$RelationshipProblemComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($RelationshipProblemITStudents as $RelationshipProblemITStudent)
                                            <a href="/studentanswerlist/{{$RelationshipProblemITStudent->id}}">2014-{{$RelationshipProblemITStudent->id}} | {{$RelationshipProblemITStudent->firstname}} {{$RelationshipProblemITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif
                                        
                                    @endif 

                                    @if($questioncategory == "Stress-Management")  


                                        @if($course->id == 7)
                                            @foreach($StressISStudents as $StressISStudent)
                                            <a href="/studentanswerlist/{{$StressISStudent->id}}">2014-{{$StressISStudent->id}} | {{$StressISStudent->firstname}} {{$StressISStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 8)
                                            @foreach($StressCAStudents as $StressCAStudent)
                                            <a href="/studentanswerlist/{{$StressCAStudent->id}}">2014-{{$StressCAStudent->id}} | {{$StressCAStudent->firstname}} {{$StressCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($StressComSciStudents as $StressComSciStudent)
                                            <a href="/studentanswerlist/{{$StressComSciStudent->id}}">2014-{{$StressComSciStudent->id}} | {{$StressComSciStudent->firstname}} {{$StressComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($StressITStudents as $StressITStudent)
                                            <a href="/studentanswerlist/{{$StressITStudent->id}}">2014-{{$StressITStudent->id}} | {{$StressITStudent->firstname}} {{$StressITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif


                                    @endif 

                                    @if($questioncategory == "Student-Teacher-Conflict") 

                                        @if($course->id == 7)
                                            @foreach($StudentTeacherISStudents as $StudentTeacherISStudent)
                                            <a href="/studentanswerlist/{{$StudentTeacherISStudent->id}}">2014-{{$StudentTeacherISStudent->id}} | {{$StudentTeacherISStudent->firstname}} {{$StudentTeacherISStudent->lastname}} <br> </a>         
                                            @endforeach
                                            @endif

                                        @if($course->id == 8)
                                            @foreach($StudentTeacherCAStudents as $StudentTeacherCAStudent)
                                            <a href="/studentanswerlist/{{$StudentTeacherCAStudent->id}}">2014-{{$StudentTeacherCAStudent->id}} | {{$StudentTeacherCAStudent->firstname}} {{$StudentTeacherCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($StudentTeacherComSciStudents as $StudentTeacherComSciStudent)
                                            <a href="/studentanswerlist/{{$StudentTeacherComSciStudent->id}}">2014-{{$StudentTeacherComSciStudent->id}} | {{$StudentTeacherComSciStudent->firstname}} {{$StudentTeacherComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($StudentTeacherITStudents as $StudentTeacherITStudent)
                                            <a href="/studentanswerlist/{{$StudentTeacherITStudent->id}}">2014-{{$StudentTeacherITStudent->id}} | {{$StudentTeacherITStudent->firstname}} {{$StudentTeacherITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                    @endif 

                                    @if($questioncategory == "Self-Image")
                                    
                                    
                                        @if($course->id == 7)
                                            @foreach($SelfImageISStudents as $SelfImageISStudent)
                                            <a href="/studentanswerlist/{{$SelfImageISStudent->id}}">2014-{{$SelfImageISStudent->id}} | {{$SelfImageISStudent->firstname}} {{$SelfImageISStudent->lastname}} <br> </a>         
                                            @endforeach
                                            @endif

                                        @if($course->id == 8)
                                            @foreach($SelfImageCAStudents as $SelfImageCAStudent)
                                            <a href="/studentanswerlist/{{$SelfImageCAStudent->id}}">2014-{{$SelfImageCAStudent->id}} | {{$SelfImageCAStudent->firstname}} {{$SelfImageCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($SelfImageComSciStudents as $SelfImageComSciStudent)
                                            <a href="/studentanswerlist/{{$SelfImageComSciStudent->id}}">2014-{{$SelfImageComSciStudent->id}} | {{$SelfImageComSciStudent->firstname}} {{$SelfImageComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($SelfImageITStudents as $SelfImageITStudent)
                                            <a href="/studentanswerlist/{{$SelfImageITStudent->id}}">2014-{{$SelfImageITStudent->id}} | {{$SelfImageITStudent->firstname}} {{$SelfImageITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif


                                    @endif 

                                    @if($questioncategory == "Bullying") 

                                        @if($course->id == 7)
                                            @foreach($BulliedISStudents as $BulliedISStudent)
                                            <a href="/studentanswerlist/{{$BulliedISStudent->id}}">2014-{{$BulliedISStudent->id}} | {{$BulliedISStudent->firstname}} {{$BulliedISStudent->lastname}} <br> </a>         
                                            @endforeach
                                            @endif

                                        @if($course->id == 8)
                                            @foreach($BulliedCAStudents as $BulliedCAStudent)
                                            <a href="/studentanswerlist/{{$BulliedCAStudent->id}}">2014-{{$BulliedCAStudent->id}} | {{$BulliedCAStudent->firstname}} {{$BulliedCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($BulliedComSciStudents as $BulliedComSciStudent)
                                            <a href="/studentanswerlist/{{$BulliedComSciStudent->id}}">2014-{{$BulliedComSciStudent->id}} | {{$BulliedComSciStudent->firstname}} {{$BulliedComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($BulliedITStudents as $BulliedITStudent)
                                            <a href="/studentanswerlist/{{$BulliedITStudent->id}}">2014-{{$BulliedITStudent->id}} | {{$BulliedITStudent->firstname}} {{$BulliedITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                    @endif 

                                    @if($questioncategory == "Peer Pressure") 
                                    
                                    
                                        @if($course->id == 7)
                                            @foreach($PeerPressuredISStudents as $PeerPressuredISStudent)
                                            <a href="/studentanswerlist/{{$PeerPressuredISStudent->id}}">2014-{{$PeerPressuredISStudent->id}} | {{$PeerPressuredISStudent->firstname}} {{$PeerPressuredISStudent->lastname}} <br> </a>         
                                            @endforeach
                                            @endif

                                        @if($course->id == 8)
                                            @foreach($PeerPressuredCAStudents as $PeerPressuredCAStudent)
                                            <a href="/studentanswerlist/{{$PeerPressuredCAStudent->id}}">2014-{{$PeerPressuredCAStudent->id}} | {{$PeerPressuredCAStudent->firstname}} {{$PeerPressuredCAStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 9)
                                            @foreach($PeerPressuredComSciStudents as $PeerPressuredComSciStudent)
                                            <a href="/studentanswerlist/{{$PeerPressuredComSciStudent->id}}">2014-{{$PeerPressuredComSciStudent->id}} | {{$PeerPressuredComSciStudent->firstname}} {{$PeerPressuredComSciStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif

                                        @if($course->id == 10)
                                            @foreach($PeerPressuredITStudents as $PeerPressuredITStudent)
                                            <a href="/studentanswerlist/{{$PeerPressuredITStudent->id}}">2014-{{$PeerPressuredITStudent->id}} | {{$PeerPressuredITStudent->firstname}} {{$PeerPressuredITStudent->lastname}} <br> </a>         
                                            @endforeach
                                        @endif


                                    @endif 
                                </button> </a> </div>
                        
                        

                    </div>

                </div>
                
            </div>

            <div class="w-1/6 h-full flex-nowrap justify-end bg-white items-center"> 
            
                <div class="flex justify-center"> <button class="bg-gray-800 text-white font-bold px-8 mt-4 py-1 ml-12"> Print <button>  </div>

            </div>
           
    
        </div>
    

        
    </div>

    <div id="pagination" class="w-full h-1/6 bg-white">
    @foreach ($CCScourse as $course)

    @if($questioncategory == "Student-Teacher-Conflict") 

        @if($course->id == 7)
        {{ $StudentTeacherISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $StudentTeacherCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $StudentTeacherComSciStudents->links()}} 
        @endif
        @if($course->id == 10)
        {{ $StudentTeacherITStudents->links()}} 
        @endif 

    @endif

    @if($questioncategory == "Motivation")  

        @if($course->id == 7)
        {{ $LackOfMotivationISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $LackOfMotivationCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $LackOfMotivationComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $LackOfMotivationITStudents->links()}} 
        @endif 

    @endif

    @if($questioncategory == "Anxiety") 
    
        @if($course->id == 7)
        {{ $AnxiousISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $AnxiousCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $AnxiousComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $AnxiousITStudents->links()}} 
        @endif 

    @endif


    @if($questioncategory == "Relationships")
    
        @if($course->id == 7)
        {{ $RelationshipProblemISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $RelationshipProblemCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $RelationshipProblemComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $RelationshipProblemITStudents->links()}} 
        @endif 

    @endif


    @if($questioncategory == "Stress-Management") 
    
        @if($course->id == 7)
        {{ $StressISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $StressCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $StressComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $StressITStudents->links()}} 
        @endif 
    
    @endif
   
    @if($questioncategory == "Self-Image") 
    
        @if($course->id == 7)
        {{ $SelfImageISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $SelfImageCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $SelfImageComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $SelfImageITStudents->links()}} 
        @endif 

    @endif


    @if($questioncategory == "Bullying") 

        @if($course->id == 7)
        {{ $BulliedISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $BulliedCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $BulliedComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $BulliedITStudents->links()}} 
        @endif
    
    @endif


    @if($questioncategory == "Peer Pressure") {{$PeerPressuredCCSStudents->links()}} 
    
        @if($course->id == 7)
        {{ $PeerPressuredISStudents->links()}} 
        @endif 
        @if($course->id == 8)
        {{ $PeerPressuredCAStudents->links()}}
        @endif
        @if($course->id == 9)
        {{ $PeerPressuredComSciStudents->links()}}
        @endif
        @if($course->id == 10)
        {{ $PeerPressuredITStudents->links()}} 
        @endif
    
    @endif

    @endforeach
    </div>

</div>


</x-layout>