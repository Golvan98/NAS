<x-layout>


<div id="body" class="bg-gray-300 flex-auto my-auto "> 


    <article class="bg-gray-500 flex">     

    
        @foreach($surveys as $survey)

        <article class="flex-auto items-center justify-center text-center bg-gray-300 flex-auto font-bold border border-red-500">
            <a href="/survey/{{$survey->id}}">
                <div>
                     {{$survey->name}} 
                     <section class="hero container mx-auto flex justify-center">
                        <img src="{{ asset('storage/manage.png') }}" alt="description of myimageee"> 
                    </section>
                </div>        


            </a>
            
        </article>
        @endforeach
       
    </article>
        
      

    

</div>





</x-layout>