@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new project</div>
                    <div class="panel-body" style="min-height: 80vh">
                        <form class="form-horizontal" role="form" method="POST" action="/home/projects/create">
                            {{ csrf_field() }}
                            <input id="id" type="hidden"  name="id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="technology" class="col-md-4 control-label">Technology</label>

                                <div class="col-md-6">
                                    <input id="technology" type="text" class="form-control" name="technology" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deadline" class="col-md-4 control-label">Deadline</label>

                                <div class="col-md-2">
                                    <input id="year" type="number" min="{{date('Y')}}" value="{{date('Y')}}"  class="form-control" name="year" required autofocus>
                                </div>

                                <div class="col-md-2">
                                    <input id="month" type="number" max="12" min="1" value="01" class="form-control" name="month" required autofocus>
                                </div>
                                <div class="col-md-2">
                                    <input id="day" type="number" max="31" min="1" value="01" class="form-control" name="day" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description"  style="height: 40px; max-width: 100%"  class="form-control" name="description" onkeyup="extend()"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-2">
                            <a href = "/home/projects" role = "button" class="btn btn-default start-button">Back to the projects list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
