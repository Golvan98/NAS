<x-resultlayout>


<div id="body" class="bg-gray-300 w-full"> 

    <div class="bg-gray-500 mt-16">     

    
        <article class="bg-gray-300 flex-auto text-black font-bold py-3"> &nbsp &nbsp &nbsp &nbsp  &nbsp    Select a Category
           
            <div class="mt-2 border border-red-500"></div>
        
        </article>

    </div>


    <div class="flex-nowrap w-full bg-gray-300 h-auto">

        <div class="w-full bg-gray-300 space-x-12 mt-2 flex justify-between items-center h-auto px-24 py-8">


            <div class="w-full flex justify-between items-center h-auto bg-green-300">  

               
                                                    
                <div class="w-full flex flex-wrap justify-between bg-gray-300 "> 

                    @foreach($questioncategories  as $questioncategory)     
                    
                    <div class="ml-4 mt-4"> <a href="/viewsurveyresult/{{$questioncategory}}">  
                        <button class="w-48 h-12 bg-gray-400 rounded-xl"> {{$questioncategory}}</button> </a>
                    </div>

                    @endforeach
                </div>

              
            
            </div>


        </div>
        
        <div class="w-full flex justify-start h-auto bg-gray-300">  <a href="/viewsurveys"> <button class="text-center bg-green-500 px-9 py-1 text-white font-bold ml-8 mb-2 "> Back </button> </a> </div>

    </div>

    

</div>




</x-resultlayout>