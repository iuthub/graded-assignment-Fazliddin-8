<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
    public function getWelcome()
    {
        $tasks = Auth::check()?Auth::user()->tasks:[];
    	return view('welcome', [
    		'tasks' => $tasks
    	]);
    }
	
	public function getEditTask($id)
    {
        $task = Task::find($id);
        
        if (Gate::denies('update_task', $task)) {
          return redirect()->back()->with([
            'error' => 'You cannot edit this task!'
        ]);
        }

    	return view('edit', [
    		'task' => $task
    	]);
    }

    public function postCreateTask(Request $req)
    {   
    	$this->validate($req, [
			'newTask' => 'required|regex:/(\w.+\s).+$/'
		]);

        $user = Auth::user();
    	$task = new Task(['content' => 
    		$req->input('newTask')
    	]);
    	$user->tasks()->save($task);

    	return redirect()->route('welcome')->with([
			'info' => 'Task was created!'
		]);
    }

    public function postEditTask(Request $req)
    {	
        $this->validate($req, [
            'newTask' => 'required|regex:/(\w.+\s).+$/'
        ]);

        $task = Task::find($req->input('idTask'));

        if (Gate::denies('update_task', $task)) {
          return redirect()->back()->with([
            'error' => 'You cannot edit this task!'
        ]);
        }
    	
    	$task->content = $req->input('newTask');
    	$task->save();
    
        return redirect()->route('welcome')->with([
			'info' => 'Task was updated!'
		]);
    }

    public function getDeleteTask($id)
    {

    	$task = Task::find($id);

        if (!Auth::check() || Gate::denies('update_task', $task)) {
          return redirect()->back()->with([
            'error' => 'You cannot edit this task!'
        ]);
        }

    	$task->delete();

    	return redirect()->route('welcome')->with([
			'info' => 'Task was deleted!'
		]);
    }
}
