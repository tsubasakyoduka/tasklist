<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class MicropostsController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
       
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
         return view('welcome', $data);
         
    }
   public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10', 
        ]);
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }

}
