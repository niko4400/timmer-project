@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit project</div>
                    <div class="panel-body" style="min-height: 80vh">
                        @php
                            $deadline=explode('-',$main_project->deadline);
                            $end = explode('-',$main_project->project_end);
                        @endphp
                        <form class="form-horizontal" role="form" method="POST" action="/home/projects/edit">
                            {{ csrf_field() }}
                            <input id="id" type="hidden"  name="id" value="{{$main_project->id}}">
                            <div class="form-group">
                                <label for="name"  class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$main_project->name}}" class="form-control" name="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="technology" class="col-md-4 control-label">Technology</label>

                                <div class="col-md-6">
                                    <input id="technology" type="text" value="{{$main_project->technology}}" class="form-control" name="technology" required autofocus>
                                </div>
                            </div>
                            @if($main_project->project_end != NULL)
                                <div class="form-group">
                                    <label for="End" class="col-md-4 control-label">End</label>
                                    <div class="col-md-2">
                                        <input id="yearEnd" type="number" min="1880" value="{{$end[0]}}"  class="form-control" name="yearEnd">
                                    </div>

                                    <div class="col-md-2">
                                        <input id="monthEnd" type="number" max="12" min="1"value="{{$end[1]}}" class="form-control" name="monthEnd">
                                    </div>
                                    <div class="col-md-2">
                                        <input id="dayEnd" type="number" max="31" min="1" value="{{$end[2]}}" class="form-control " name="dayEnd">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="checkEnd" class="col-md-4 control-label">Set to active</label>
                                    <div class="col-md-2">
                                        <input id="checkEnd" type="checkbox"  class=" checkbox-inline" name="checkEnd" >
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="deadline" class="col-md-4 control-label">Deadline</label>
                                <div class="col-md-2">
                                    <input id="yearDeadline" type="number" min="1880" value="{{$deadline[0]}}"  class="form-control" name="yearDeadline" >
                                </div>

                                <div class="col-md-2">
                                    <input id="monthDeadline" type="number" max="12" min="1" value="{{$deadline[1]}}" class="form-control" name="monthDeadline" >
                                </div>
                                <div class="col-md-2">
                                    <input id="dayDeadline" type="number" max="31" min="1" value="{{$deadline[2]}}" class="form-control" name="dayDeadline" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description"  style="height: 40px; max-width: 100%"  class="form-control" name="description" onkeyup="extend()">{{$main_project->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
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
