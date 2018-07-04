@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">

                        Update Todo Task

                    </div>

                    <div class="card-body">

                        <form action="/todo/{{$task->id}}" method="POST">

                            {{csrf_field()}}

                            {{method_field('PUT')}}

                            <div class="form-group">

                                <input type="text" name="name" class="form-control" value="{{$task->name}}" placeholder="Enter the name of the task..">

                            </div>

                            <div class="form-group">

                                <textarea name="description" rows="3" class="form-control" placeholder="Enter the description of the task..">{{$task->description}}</textarea>

                            </div>

                            <div class="form-group">

                                <button class="btn btn-primary" type="submit">Submit</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>


        </div>

    </div>

@endsection