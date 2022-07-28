<x-layout>
    <script src="../path/to/flowbite/dist/flowbite.js"></script>

<div class="w-full bg-gray-300 flex-nowrap ">

    <div class="w-full h-5/6 bg-gray-500 flex justify-center items-center">

        <div class="w-4/6 h-5/6 bg-red-300 flex-nowrap border border-white mt-14">

            <div class="w-full py-4  flex justify-center mt-4">
                <strong>   <div>     {{$SurveyQuestion->question }} DIV TEST!</div> </strong>
            </div>  

            @foreach($QuestionChoices as $QuestionChoice)
            <div class="w-full  flex justify-between mt-3">


                <div class="w-1/3 text-center"> <button class="bg-gray-300 px-4 py-1 rounded-xl">   {{ $QuestionChoice->question_choice }}  </button> </div>

                <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium px-8 py-2 rounded-xl ml-2 mb-2 mr-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 modal" type="button" data-modal-toggle="{{ $QuestionChoice->id }}">
                      Edit Question Choice 
                </button>

                <form method ="POST" action="/updatequestionchoice/{{$QuestionChoice->id}}"  id="{{ $QuestionChoice->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="bg-red-200 close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ $QuestionChoice->id }}" data-dismiss="{{ $QuestionChoice->id }}">
                                    <svg class="w-5 h-5 close"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white"> Edit Question Choice</h3>
                                    <div class="space-y-6">   
                                      @csrf
                                      @method('PATCH')
                                        <div>
                                            <label for="question_choice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Question Choice</label>
                                            <input type="text" name="question_choice" id="question_choice" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="{{$QuestionChoice->question_choice}}" required>
                                        </div>

                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" >Edit Question Choice</button>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

                <form method="POST" action="/deletequestionchoice/{{$QuestionChoice->id}}" class="w-1/3 text-center"> @method('DELETE') @csrf <a href="/delete{{$QuestionChoice->id}}"> 
                    <button type="submit" class="bg-red-500 px-4 py-1 rounded-xl"> Delete </button> </a> 
                </form> 

                
            </div>
            @endforeach

            

            


        </div>

    </div>

    <div class="w-full h-1/6 bg-blue-300 flex-nowrap">

        <div class="w-full h-1/2 bg-gray-300 flex justify-center items-center"> 

        <div class="w-5/6 h-full bg-red-500 flex justify-between items-center">
                    <div> <button class="px-6 py-1 ml-2 rounded-xl bg-gray-300"> Back <button> </div>    
                    <div> <button class="px-2 py-1 mr-2 rounded-xl bg-gray-300"> Add Survey <button> </div>
        </div>

        </div>


        <div class="w-full h-1/2 bg-transparent">
            {{$QuestionChoices->links()}} 
        </div>

    </div>

    
    
   
</div>

</x-layout>