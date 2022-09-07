<x-layout>

<div id="main" class="flex-nowrap w-full full bg-gray-300 b">


    <div class="w-full bg-white flex h-1/6 justify-center items-end  ">
        
       <div class="w-full flex-nowrap ">
        
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

                        <div class="flex justify-center items-center h-2/3 text-lg font-bold"> School of Computer Studies </div>
                        <div class="flex justify-center h-1/3 items-start text-lg">

                            {{$questioncategory}} 

                          



                        </div>

                   </div>

                   <div class="flex-nowrap items-start h-5/6"> 

                        <div class="flex justify-center text-lg font-bold"> BS Information Systems </div>
                        
                        
                        
                             <div class="flex justify-center"> <a href="/studentanswerlist"> 
                                <button>  
                                    @if($questioncategory == "Motivation") 
                                    {{$questioncategory}}
                                    @endif 
                                    @if($questioncategory == "Anxiety") 
                                        @foreach($AnxiousCCSStudents as $AnxiousCCSStudent)
                                                @if($AnxiousCCSStudent->course_id == 7)
                                                    2014-{{$AnxiousCCSStudent->id}} | {{$AnxiousCCSStudent->firstname}} {{$AnxiousCCSStudent->lastname}} 
                                                @endif
                                        @endforeach
                                    @endif 
                                    @if($questioncategory == "Relationships") 
                                    {{ $questioncategory }}
                                    @endif 
                                    @if($questioncategory == "Stress-Management") 
                                    {{ $questioncategory }}
                                    @endif 
                                    @if($questioncategory == "Student-Teacher-Conflict") 
                                    {{  $questioncategory }}
                                    @endif 
                                    @if($questioncategory == "Self-Image") 
                                    {{  $questioncategory }}
                                    @endif 
                                    @if($questioncategory == "Bullying") 
                                    {{  $questioncategory }}
                                    @endif 
                                    @if($questioncategory == "Peer Pressure") 
                                    {{  $questioncategory }}
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
      
         {{$students->links()}}
        
    </div>

</div>


</x-layout>