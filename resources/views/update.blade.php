@extends('layouts.master')
@section('content')
<br>
  <h2 class="text-center">Update a Task</h2>
<br>
<div class="col-lg-12 justify-content-lg-center">
		<a href="javascript:history.back()"><button type="button" class="btn btn-default">Go Back</button></a>
	 	<br><br>
	 	
 	<form method="POST" action="{{action('TodosController@update',$todo)}}">
		{{csrf_field()}}
	
		<div class="input-group input-group-lg">
			<label for="task"></label>
			<textarea name="task" class="form-control" rows="3">{{$todo->task}}</textarea>
		</div>
		<br>
		<div class="form-group">	
        	<button class="btn btn-primary" type="submit">Submit</button>
    	</div>
      	
      </div>
	</form>
</div>
@endsection