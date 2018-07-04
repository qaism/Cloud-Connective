<?php

namespace App\Http\Controllers;

use App\Todo;
use App\TodoMirror;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo::all();
        return view('todo.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Todo();

        $task->name = $request->name;

        $task->description = $request->description;

        $task->save();

        $todo_mirror = new TodoMirror();

        $todo_mirror->name = $task->name;

        $todo_mirror->description = $task->description;

        $todo_mirror->todo_id = $task->id;

        $todo_mirror->save();

        return redirect('/todo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Todo::find($id);

        return view('todo.edit',compact('task'));
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
        $task = Todo::find($id);

        $task->name = $request->name;

        $task->description = $request->description;

        $task->save();

        $todo_mirror = TodoMirror::where('todo_id',$task->id)->first();

        $todo_mirror->name = $task->name;

        $todo_mirror->description = $task->description;

        $todo_mirror->todo_id = $task->id;

        $todo_mirror->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return back();
    }
}
