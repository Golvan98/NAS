<x-layout>


<div id="body" class="bg-gray-300 flex-auto"> 


    @php 
    $surveys = App\Models\Survey::all();
    @endphp

    <article class="bg-gray-500 mt-16">     

    
        <article class="bg-gray-300 flex-auto text-black font-bold py-3"> &nbsp &nbsp &nbsp  Good Evening, Counselor! Click The Survey Name to test  @foreach($surveys as $survey)  <a href = "/testsurvey/{{$survey->id}}" class="text-zinc-500">{{$survey->name}} @endforeach </a>
            <div class="">    </div>
            <div class="mt-2 border border-red-500"></div>
        
        </article>

    </article>


    <article class="bg-white flex"
    >    


        <article class="ml-4 flex-auto text-black font-bold text-left"> What would you like to do today?
            
            <div class="flex-auto text-center"> 
            <a href="/surveylist"> 

                    <section class="hero container mx-auto flex justify-center">
                        <img src="{{ asset('storage/manage.png') }}" alt="description of myimage"> 
                    </section>
            </a>
             </div>
            <div class="">   
                
            </div>
        </article>

    
    
        <article class="content-center text-black flex flex-auto font-bold">

            <article class="bg-white flex-auto text-center font-bold"> <br>
                 <div class="text-center"> 
                             
                        <a href="viewsurveys"> 
                    <section class="hero container mx-auto flex justify-center">
                        <img src="{{ asset('storage/manageresult.png') }}" alt="description of myimage"> 
                    </section>
                        </a>
                 </div>

                <div class="text-center"> 
                    
                </div>
            </article>
        </article>

    </article>

    

</div>








</x-layout>