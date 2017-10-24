<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Todo;
use App\Repositories\TaskRepository;
use Session;
use Illuminate\Support\Facades\DB;

class TodosController extends Controller

{
	protected $todos;

	public function __construct(TaskRepository $todos)
    {
        $this->middleware('auth');
        $this->todos = $todos;
    }

    public function index(Request $request){
    	// DB::table('todos')->where('id', '>', 100)->delete();
    	// $todos = Todo::orderBy('created_at','desc')->paginate(5);
    	return view ('home', [
    		'todos'=> $this->todos->forUser($request->user()),
    	]);
    }
    
    public function store(Request $request){
    	$this->validate($request,[
    		'task'=>'required|min:6|max:200'
    	]);
    	$request->user()->tasks()->create([
    		'task'=> $request->task
    	]);

    	Session::flash('success','Your task was created!');
    	return redirect('/home');
    }
    public function destroy($id){
    	$todo = Todo::find($id);
    	$todo->delete();
    	Session::flash('success','Your task was deleted!');
    	return redirect('/home');
    }
    public function edit($id){
    	$todo = Todo::find($id);
    	return view('update')->with('todo',$todo);

    }
    public function update(Request $request, $id){
    	$todo = Todo::find($id);
    	$todo->task = $request->input('task');
    	$todo->save();
    	Session::flash('success','Your task was updated!');
    	return redirect('/home')->with('todo',$todo);
    }
    public function completed($id){
    	$todo = Todo::find($id);
    	$todo->completed = 1;
    	$todo->save();
    	Session::flash('success','Your task was marked as completed!');
    	return redirect()->back();
    }

}
