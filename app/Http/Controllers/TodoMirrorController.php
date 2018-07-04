<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TodoMirror;
use Illuminate\Http\Request;

class TodoMirrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks_mirror = TodoMirror::all();
        return view('todo-mirror.index',compact('tasks_mirror'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo-mirror.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $task = new Todo();

        $task->name = $request->name;

        $task->description = $request->description;

        $task->save();

        $todo_mirror = new TodoMirror();

        $todo_mirror->name = $task->name;

        $todo_mirror->description = $task->description;

        $todo_mirror->todo_id = $task->id;

        $todo_mirror->save();

        return redirect('/todo-mirror');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task_mirror = TodoMirror::find($id);

        return view('todo-mirror.edit',compact('task_mirror'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $todo_mirror = TodoMirror::find($id);

        $todo_mirror->name = $request->name;

        $todo_mirror->description = $request->description;

        $todo_mirror->save();

        $todo = Todo::find($todo_mirror->todo_id);

        $todo->name = $request->name;

        $todo->description = $request->description;

        $todo->save();

        return redirect('/todo-mirror');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo_mirror = TodoMirror::find($id);

        $task = Todo::find($todo_mirror->todo_id);

        $task->delete();

        return redirect('/todo-mirror');
    }
}
