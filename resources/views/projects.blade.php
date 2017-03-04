@php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 2017-03-02
 * Time: 12:08
 */
 @endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="panel-heading  head-panel">Dashboard</div>
                <div class="panel panel-default box" style="min-height: 800px">

                    <div class="panel-body">
                        {{$projects->links()}} <br>

                        @if(isset($delete)) Project with id={{$delete}} was removed @endif
                        @if(isset($edit)) Project with id={{$edit}} was edited @endif
                        @if(isset($finish)) Project with id={{$finish}} was finished @endif
                    </div>
                        <table class="table">
                            <tr>
                                <th>Project name</th>
                                <th>Project finished</th>
                                <th>Options</th>
                            </tr>
                            @php $i=1;  @endphp
                            @foreach($projects as $project)
                                @php
                                    $flagEnd=false;
                                    if($project->project_end != NULL) {
                                        $end='Yes';
                                        $flagEnd=true;
                                    }else
                                        $end='No';
                                @endphp
                                <tr>
                                    <td>{{$project->name}}</td>
                                    <td>{{$end}}</td>
                                    <td> <a class="btn btn-info start" href="/home/projects/edit/{{$project->id}}">Edit</a>
                                        @if($flagEnd != true)
                                            <a class="btn btn-danger pause-button" onclick="finishProject({{$project->id}})" >End project</a>
                                        @else
                                            <a class="btn btn-danger pause-button" disabled="disabled" >End project</a>
                                        @endif
                                         <a class="btn btn-danger stop-button"  onclick="deleteProject({{$project->id}})">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    {{$projects->links()}}
                </div>
            </div>

            <!-- Add clearfix for only the required viewport -->
            <div class="clearfix visible-xs"></div>

        </div>
    </div>

@endsection