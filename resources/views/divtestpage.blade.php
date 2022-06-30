<x-layout>

<div class="w-full bg-gray-300">

        <div class="flex justify-start w-full h-1/4 items-end bg-gray-300 border border-red-500">
            <div class="ml-12">Good Day, Counselor! </div>
        </div>

        
        <div class="flex justify-center w-full h-3/4 bg-gray-300 border border-green-500"> 
        <form method="POST" action="" class=" mt-4 mx-4 flex-nowrap w-full h-5/6 bg-white border border-green-500">  
            @csrf @method('POST')  

        


         
          <div class="flex-nowrap bg-white w-full h-5/6">
            <table>

               <tr>
                <div class="flex justify-center items-center bg-white w-full h-auto h-2/6 "> MipMerp </div>

                  <div class="flex bg-gray-300 h-1/6"> 
                    <div class="flex justify-center items-center bg-red-300 px-4 py-1 w-1/3 h-auto border border-white"> <input type="checkbox"> MipMerp </div>
                    <div class="flex justify-center items-center bg-red-300 px-4 py-1 w-1/3 h-auto border border-white"> <input type="checkbox"> MipMerp </div>
                    <div class="flex justify-center items-center bg-red-300 px-4 py-1 w-1/3 h-auto border border-white"> <input type="checkbox"> MipMerp </div>
                  </div>

                  <div class="flex bg-gray-300 h-1/6">   
                    <div class="flex justify-center items-center bg-red-300 px-4 py-1 w-1/3 h-auto border border-white"> <input type="checkbox"> MipMerp </div>

                    <div class="flex justify-center items-center bg-red-300 px-4 py-1 w-1/3 h-auto border border-white"> <input type="checkbox"> MipMerp </div>
                  </div>



            </table>
          </div>

          <div class="flex justify-between w-full h-1/6 bg-red-100">
           <div class=""> <button class="px-8 py-2 bg-red-500 rounded-xl"> Back </div> 
           <div class=""> <button class="px-8 py-2 bg-blue-300 rounded-xl"> Edit </div> 
           <div class=""> <button class="px-8 py-2 bg-green-500 rounded-xl"> Next </div> 
          </div>
        
        
         
        </div>
</form>
</div>
    
</x-layout>