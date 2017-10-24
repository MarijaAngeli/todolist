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

		<div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label for="task"></label>
                <textarea name="task" rows="5" class="form-control">{{$todo->task}}</textarea>
            </div>
        </div>
		<br>
		<div class="form-group">	
        	<button class="btn btn-primary" type="submit">Submit</button>
    	</div>
      	
      </div>
	</form>
</div>
@endsection