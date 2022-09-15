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

                        <div class="flex justify-center text-lg font-bold"> @foreach ($CCScourse as $course) {{$course->coursename}} @endforeach</div> 
                     
                               
                        
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

                                    @if($questioncategory == "Stress-Management")  
                                        @foreach($StressCCSStudents as $StressCCSStudent)
                                                    @if($StressCCSStudent->course_id == $course->id) 
                                                    <a href="/studentanswerlist/{{$StressCCSStudent->id}}">2014-{{$StressCCSStudent->id}} | {{$StressCCSStudent->firstname}} {{$StressCCSStudent->lastname}} <br> </a>
                                                    @endif
                                        @endforeach
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
                                        @foreach($SelfImageCCSStudents as $SelfImageCCSStudent)
                                                    @if($SelfImageCCSStudent->course_id == $course->id) 
                                                    <a href="/studentanswerlist/{{$SelfImageCCSStudent->id}}">2014-{{$SelfImageCCSStudent->id}} | {{$SelfImageCCSStudent->firstname}} {{$SelfImageCCSStudent->lastname}} <br></a>
                                                    @endif
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Bullying") 
                                        @foreach($BulliedCCSStudents as $BulliedCCSStudent)
                                                    @if($BulliedCCSStudent->course_id == $course->id)  
                                                    <a href="/studentanswerlist/{{$BulliedCCSStudent->id}}">2014-{{$BulliedCCSStudent->id}} | {{$BulliedCCSStudent->firstname}} {{$BulliedCCSStudent->lastname}}  <br></a>
                                                    @endif
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Peer Pressure")  
                                        @foreach($PeerPressuredCCSStudents as $PeerPressuredCCSStudent)
                                                    @if($PeerPressuredCCSStudent->course_id == $course->id) 
                                                       <a href="/studentanswerlist/{{$PeerPressuredCCSStudent->id}}">2014-{{$PeerPressuredCCSStudent->id}} | {{$PeerPressuredCCSStudent->firstname}} {{$PeerPressuredCCSStudent->lastname}}  </a> <br>
                                                    @endif
                                        @endforeach
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
        {{ $StudentTeacherComSciStudents->links()}} hi
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