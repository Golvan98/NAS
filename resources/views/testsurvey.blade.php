<x-layout>


<div class="bg-gray-300">

<form method="POST" action="#"> 

@foreach($survey->surveyquestion as $surveyquestionz)


{{ $surveyquestionz->question }}

<input name="{{$surveyquestionz}}" class="mb-2 mr-2">         </input>
<br>

@endforeach



<button type="submit" class="bg-gray-500 text-black rounded ml-1 py-4 px-2 hover:bg-gray-100 text-black"> Submit Answer </button>
</form>

</div>


</x-layout>