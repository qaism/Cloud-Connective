@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">

                        Create Todo Task

                    </div>

                    <div class="card-body">

                        <form action="/todo" method="POST">

                            {{csrf_field()}}

                            <div class="form-group">

                                <input type="text" name="name" class="form-control" placeholder="Enter the name of the task.." required>

                            </div>

                            <div class="form-group">

                                <textarea name="description" rows="3" class="form-control" placeholder="Enter the description of the task.." required></textarea>

                            </div>

                            <div class="form-group">

                                <button class="btn btn-primary" type="submit">Submit</button>

                            </div>

                            <div class="form-group">

                                @include('layouts.errors')

                            </div>

                        </form>

                    </div>

                </div>

            </div>


        </div>

    </div>

@endsection