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

                        <div class="flex justify-center items-center h-2/3 text-lg font-bold">  School of Computer Studies  </div>
                        <div class="flex justify-center h-1/3 items-start font-bold">  
                        <select name="formal"  onchange="javascript:handleSelect(this)">

                            @foreach($questioncategories as $selectcategory) 
                            <option value="/collegestudentlist/CCS/{{$selectcategory}}" @if($selectcategory == $questioncategory) selected @endif >
                                
                                    {{$selectcategory}}

                            </option> 
                            @endforeach

                        </select>

                        <script type="text/javascript">
                        function handleSelect(elm)
                        {
                            window.location = elm.value+"";
                        }
                        </script>
                       
                            

                      



                        </div>

                   </div>

                   <div class="flex-nowrap items-start h-5/6 mt-4"> 

                        <div class="flex justify-center text-lg font-bold"> @if($college=="CCS") College of Computer Science @endif Students </div> 
                     
                               
                        
                             <div class="flex justify-center"> 
                                <button>
                                    @if($questioncategory == "Motivation") 
                                        @foreach($LackOfMotivationCCSStudents as $LackOfMotivationCCSStudent)                                              
                                                    <a href="/studentanswerlist/{{$LackOfMotivationCCSStudent->id}}">     2014-{{$LackOfMotivationCCSStudent->id}} | {{$LackOfMotivationCCSStudent->firstname}} {{$LackOfMotivationCCSStudent->lastname}} <br> </a>                                                     
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Anxiety") 
                                        @foreach($AnxiousCCSStudents as $AnxiousCCSStudent)                                              
                                                <a href="/studentanswerlist/{{$AnxiousCCSStudent->id}}">     2014-{{$AnxiousCCSStudent->id}} | {{$AnxiousCCSStudent->firstname}} {{$AnxiousCCSStudent->lastname}}<br> </a>                                                
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Relationships") 
                                        @foreach($RelationshipProblemCCSStudents as $RelationshipProblemCCSStudent)                                                    
                                                    <a href="/studentanswerlist/{{$RelationshipProblemCCSStudent->id}}">   2014-{{$RelationshipProblemCCSStudent->id}} | {{$RelationshipProblemCCSStudent->firstname}} {{$RelationshipProblemCCSStudent->lastname}} <br> </a>                                                    
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Stress-Management")  
                                        @foreach($StressCCSStudents as $StressCCSStudent)                                        
                                                    <a href="/studentanswerlist/{{$StressCCSStudent->id}}">2014-{{$StressCCSStudent->id}} | {{$StressCCSStudent->firstname}} {{$StressCCSStudent->lastname}} <br> </a>                                                   
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Student-Teacher-Conflict") 
                                        @foreach($StudentTeacherCCSStudents as $StudentTeacherCCSStudent)                                       
                                                    <a href="/studentanswerlist/{{$StudentTeacherCCSStudent->id}}"> 2014-{{$StudentTeacherCCSStudent->id}} | {{$StudentTeacherCCSStudent->firstname}} {{$StudentTeacherCCSStudent->lastname}} <br>  </a>                                                                                                    
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Self-Image")  
                                        @foreach($SelfImageCCSStudents as $SelfImageCCSStudent)
                                                    <a href="/studentanswerlist/{{$SelfImageCCSStudent->id}}"> 2014-{{$SelfImageCCSStudent->id}} | {{$SelfImageCCSStudent->firstname}} {{$SelfImageCCSStudent->lastname}} <br></a>
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Bullying") 
                                        @foreach($BulliedCCSStudents as $BulliedCCSStudent)
                                                    <a href="/studentanswerlist/{{$BulliedCCSStudent->id}}">2014-{{$BulliedCCSStudent->id}} | {{$BulliedCCSStudent->firstname}} {{$BulliedCCSStudent->lastname}}  <br></a>
                                        @endforeach
                                    @endif 

                                    @if($questioncategory == "Peer Pressure")  
                                        @foreach($PeerPressuredCCSStudents as $PeerPressuredCCSStudent)
                                                       <a href="/studentanswerlist/{{$PeerPressuredCCSStudent->id}}">2014-{{$PeerPressuredCCSStudent->id}} | {{$PeerPressuredCCSStudent->firstname}} {{$PeerPressuredCCSStudent->lastname}}  </a> <br>
                                        @endforeach
                                    @endif 
                                </button> </a> 

                                
                            </div>
                        
                        

                    </div>

                </div>
                
            </div>

            <div class="w-1/6 h-full flex-nowrap justify-end bg-white items-center"> 
            
                <div class="flex justify-center"> <button class="bg-gray-800 text-white font-bold px-8 mt-4 py-1 ml-12"> Print <button>  </div>

                

            </div>
           
        

        </div>
    

        
    </div>

    <div id="pagination" class="w-full h-1/6 bg-white">
      
    @if($questioncategory == "Student-Teacher-Conflict") {{$StudentTeacherCCSStudents->links()}} @endif
    @if($questioncategory == "Motivation")  {{ $LackOfMotivationCCSStudents->links()}}  @endif
    @if($questioncategory == "Anxiety")  {{$AnxiousCCSStudents->links()}} @endif
    @if($questioncategory == "Relationships") {{$RelationshipProblemCCSStudents->links()}} @endif
    @if($questioncategory == "Stress-Management") {{$StressCCSStudents->links()}} @endif
    @if($questioncategory == "Self-Image") {{$SelfImageCCSStudents->links()}} @endif
    @if($questioncategory == "Bullying") {{$BulliedCCSStudents->links()}} @endif
    @if($questioncategory == "Peer Pressure") {{$PeerPressuredCCSStudents->links()}} @endif
        
    </div>

</div>


</x-layout>