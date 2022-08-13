@props(['SurveyQuestionId', 'SurveyQuestionName', 'SurveyQuestionType', 'SurveyQuestionCategory'])


@php 

$alltypes = App\Models\SurveyQuestion::select('type')->distinct()->get();

$allcategories = App\Models\SurveyQuestion::select('category')->distinct()->get();

$categories = $allcategories->pluck('category');

$types = $alltypes->pluck('type');

@endphp



<div class="w-1/3 flex justify-center">  

    <button class="px-8 py-1 bg-blue-500 rounded-md ml-2 mb-2 border text-white" type="button" data-modal-toggle="{{ $SurveyQuestionId }}"> Edit  </button> 
                    
</div>
                
                    
                    
                    <form method ="POST" action="/updatequestion/{{ $SurveyQuestionId }}"  id="{{ $SurveyQuestionId }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="bg-red-200 close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="{{ $SurveyQuestionId }}" data-dismiss="{{ $SurveyQuestionId }}">
                                    <svg class="w-5 h-5 close"  fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white"> Edit Question Choice</h3>
                                    <div class="space-y-6">   
                                        @csrf
                                        @method('PATCH')

                                        <div>

                                            <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Question </label>
                                            <input type="text" name="question" id="question" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $SurveyQuestionName }}" required>
                                        
                                        </div>

                                        <div class="w-full bg-gray-300 text-black font-bold flex justify-center items-center space-x-4">
                                        
                                            <label for="type">Question Type</label>
                                            <select name="type" id="type">
                                                
                                                @foreach($types as $type) 
                                                <option hidden> {{$SurveyQuestionType}}</option>
                                                <option value="{{$type}}">{{$type}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="w-full bg-gray-300 text-black font-bold flex-auto justify-between items-center space-x-4">
                                        
                                            <label for="category">Category</label>
                                            <select name="category" id="category">
                                                
                                                @foreach($categories as $category) 
                                                <option hidden> {{$SurveyQuestionCategory}}</option>
                                                <option value="{{$category}}">{{$category}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="flex justify-between">

                                            <div> <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" > Edit Question</button>   </div>
                                            <div> <button type="submit"name="delete" value="delete"  name="delete" value="delete"  class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" > Delete Question</button> </div>
                                        
                                        </div>      

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>