@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="card">

                    @if($tasks->count() == 0)

                    <div class="card text-center">

                        <div class="card-body">

                            <h3 class="text-center">You don't Have any tasks yet, try to add a new one now ..</h3>

                            <a href="/todo/create" class="btn btn-primary add-todo-task">ADD TODO TASK</a>

                        </div>

                    </div>

                    @else

                    <div class="card-body">

                        <h3 class="text-center">TODO Tasks</h3>

                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">Task Description</th>
                                <th scope="col">Settings</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td class="settings">
                                    <a href="/todo/{{$task->id}}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/todo/{{$task->id}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="/todo/create" class="btn btn-primary add-todo-task">ADD TODO TASK</a>

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection