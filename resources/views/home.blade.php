@extends('layouts.master')
@section('content')

<br>
  <h2 class="text-center">New Task</h2>
<br>
<div class="col-lg-12 justify-content-lg-center">

    <form action="/create/task" method="POST">
    {{csrf_field()}}
    <div class="input-group input-group-lg">

    <label for="task"></label>
    <input type="text" name="task" class="form-control" placeholder="Create your task">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">Create!</button>
        </span>
      </div>
    </form>
</div>
<br><br>
    <h2 class="text-center">Task List</h2>
        <br><br>
            @foreach($todos as $todo)
                <div class="col-lg-12 justify content center text-center" >
                    <a class="float-right" href="{{action('TodosController@destroy', $todo)}}"><acronym title="Delete"><i class="fa fa-trash fa-2x" aria-hidden="true" style="color: red"></i></acronym></a>

                @if(!$todo->completed)
                    <a href="{{action('TodosController@edit', $todo)}}" class="float-right"><acronym title="Update"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true">&nbsp;&nbsp;</i></acronym></a>

                    <a href="{{action('TodosController@completed', $todo)}}" class="float-right"><acronym title="Complete"><i class="fa fa-check-square-o fa-2x">&nbsp;&nbsp;</i></acronym></a>
                @else
                    <span class="text-success float-right" style="color:#3DC841"><abbr title="Completed!"><i class="fa fa-check-square-o fa-2x">&nbsp;&nbsp;</i></abbr></span>
                @endif

                <p>{{str_limit(strip_tags($todo->task), 70)}} 
                    @if(strlen(strip_tags($todo->task)) > 70)
                        <a href="{{action('TodosController@edit', $todo) }}" >read more</a>
                    @endif
                </p>
                    <hr>
                                        
                </div>  
            @endforeach
    
    <div class="text-center"> 
        {{$todos->links()}}
    </div>
@endsection
