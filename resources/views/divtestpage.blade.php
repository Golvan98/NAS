<x-layout>

<div id="main" class="flex-nowrap w-full h-full bg-gray-300">


    <div  class="w-full bg-white flex h-1/6 justify-center items-end  ">
        
       <div class="w-full flex-nowrap ">
        
            <div class="w-full flex justify-center items-end"> 
                <div class="w-4/5 text-lg"> <strong> Good Evening, Counselor! </strong> </div>
            </div>

            <div class="w-full flex justify-center"> 
                <div class="w-full h-0.5 bg-red-500 mx-2">  </div>
            </div>
       </div>
       
      
    </div>
    
    
    
    
    <div id="main box" class="w-full bg-gray-300 flex h-full justify-center items-center h-4/6">


        <div class="flex w-full h-full bg-gray-300 border border-black mt-8">

            <div id="first box" class="w-1/6 h-full flex justify-start bg-gray-300 items-end border border-red-500 "> 
            
                <div> <button class=" ml-6 mb-4 bg-green-400 text-white font-bold py-1 px-10">  Back  </div>

            </div>

            <div id="second box" class="w-4/6 h-full flex justify-center bg-gray-300 items-center border border-red-500 "> 
            
                <div> <strong>   <img class="object-fill w-full h-full" src="{{ asset('storage/dummypie.png') }}" alt="description of myimage"> </strong> </div>

            </div>

            <div id ="third box" class="w-1/6 h-full flex-nowrap  bg-gray-300  border border-red-500 "> 
            
                <div class="h-1/6"> <button class="border border-black ml-12 mt-4 bg-gray-700 text-white font-bold py-1 px-10">  Print  </button> </div>                
                <div class="h-3/6 ">   </div>
                <div class="h-2/6  ml-2 mr-2"> <img class="object-fill w-full h-full" src="{{ asset('storage/dummypie.png') }}" alt="description of myimage"> </div>
                    
            </div>
           
        

        </div>
    

        
    </div>



</div>
        
</x-layout>