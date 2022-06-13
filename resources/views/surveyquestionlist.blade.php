<x-layout>


<table class="text-black grid place-items-center m-2 text-center text-left mt-8 border border-black mb-4 ">

@foreach($survey->surveyquestion as $questions)
   <tr>              
   <th class="whitespace-pre px-20 py-4"> {{$questions->question}} </th>  
   <th class="whitespace-pre px-20 py-4"> <a href="/questioneditor/{{$questions->id}}"> <button class="bg-gray-500 rounded-xl py-2"> Edit Question </th> </button> </a>
   <th class="">
   
<form method="POST" class="border border-green-500 mr-12" action="/deletequestion/{{$questions->id}}">
    @csrf
    @method('DELETE')
   <button type="submit" class="bg-red-300 rounded-xl py-2"> Delete Questionz   </form> </th> </button> 
 
   
   </tr> 
   @endforeach   
   </table>

</x-layout>