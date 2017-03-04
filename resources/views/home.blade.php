@php
    function convert($time) {
        $d=($time/86400);
        $d=floor($d);
        $sec=$d*86400;
        $h=($time-$sec)/3600;
        $h= floor($h);
        $sec=$sec+$h*3600;
        $m=($time-$sec)/60;
        $m=floor($m);
        $sec=$sec+$m*60;
        $s=($time-$sec);



    if($h<10)
        $h='0'.$h;

    if($m<10)
        $m=':0'.$m;
        else
            $m=':'.$m;

    if($s<10)
        $s=':0'.$s;
        else
            $s=':'.$s;
     if($d>0) {
        $d=$d.' day(s)   ';
        $correctTime=''.$d.$h.'h'.$m.'m'.$s.'s';
     }else
        $correctTime=''.$h.'h'.$m.'m'.$s.'s';
    return $correctTime;
}
@endphp
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-3">
                <div class="panel-heading head-panel">Your projects
                    <input id="search" name="search" type="text" placeholder="find project"  onkeyup="searching({{json_encode($projects)}})" style="color:black"></div>
                    <div id="project-list" class="panel panel-default box" style = "overflow: auto" >
                        @foreach ($projects as $project)
                            <a href="../home/{{$project->id}}" >
                                @if($project->project_end != NULL )
                                    <div class="success" >
                                @else
                                    <div class="panel-project">
                                @endif
                                    <b>Project Name:</b> {{$project->name}} <br>
                                    @if($project->deadline != NULL)
                                        <b>Deadline:</b> {{$project->deadline}} <br>
                                    @else
                                        <b>Deadline:</b> No <br>
                                    @endif
                                    @if($project->project_end != NULL)
                                        <b>End:</b> {{$project->project_end}}
                                    @endif

                                </div>
                            </a>
                        @endforeach

                    </div>
            </div>
            <div class="col-xs-8 col-sm-9">
                <div class="panel-heading  head-panel">Dashboard</div>
                    <div class="panel panel-default box" style = "height: 100%">
                        <div class="panel-body" >
                            @if(isset($main_project))
                                @if($main_project->time==NULL)
                                    <?php $main_project->time=0; ?>
                                @endif
                                <section style = "text-align: center">
                                    <h3><b>Project name:</b><br>
                                    {{$main_project->name}} <br>
                                    </h3>
                                </section>
                                <div class="table-responsive display-Lato">
                                    <table class="table">
                                        <tr class = "info">
                                            <td>Technologies</td><td>{{$main_project->technology}}</td>
                                        </tr>
                                        <tr class = "info">
                                            <td>Last update</td><td>{{$main_project->last_update}}</td>
                                        </tr>
                                        <tr class = "info">
                                            <td>Began</td><td>{{$main_project->project_start}}</td>
                                        </tr>
                                        <tr class = "info">
                                            <td>Duration</td><td>@php echo convert($main_project->time)@endphp</td>
                                        </tr>
                                        <tr class = "info">
                                            @if($main_project->deadline != NULL)
                                                <td>Deadline</td><td>{{$main_project->deadline}}</td>
                                            @endif
                                        </tr>
                                        <tr class = "info">
                                            @if($main_project->project_end != NULL)
                                                <td>End</td><td>{{$main_project->project_end}}</td>
                                            @endif
                                        </tr>

                                    </table>
                                </div>

                            @endif
                                @if(isset($main_project))
                                    <div class="col-xs-12 col-sm-12 display-Lato">
                                        <section class = "display-time" style = "text-align: center">

                                            <div id="buttons" >
                                                <div>Time: <br>
                                                    <span id="day"></span><span id="hou"></span><span id="min"></span><span id="sec"></span><span id="data">@php echo convert($main_project->time)@endphp</span></div>
                                                    @if($main_project->project_end == NULL)
                                                        <button type="button" id="btnstart" class="btn btn-primary" onclick="start()">Start</button>
                                                        <button type="button" id="btnpause" class="btn btn-danger pause-button"  onclick="pause()">Pause</button>

                                                {!! Form::open(array('url' => '../home/'.$main_project->id)) !!}

                                                        @php
                                                            echo Form::hidden('time', ''.$main_project->time,array('id' =>'time'));
                                                            echo Form::submit('Stop',array('class' => 'btn btn-danger stop-button'));

                                                        /*    <form action ='../home/{{$main_project->id}}' method='post'>
                                                            <input type="hidden" id="time" value="{{$main_project->time}}">
                                                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                                            <input type="submit" value="stop">

                                                        </form>*/
                                                        @endphp
                                                        {!! Form::close() !!}
                                                    @else
                                                        <span style = "color:Green">This project was ended</span>
                                                    @endif
                                             </div>
                                        </section>
                                    </div>
                                @endif
                        </div>
                    </div>

            </div>
            <!-- Add clearfix for only the required viewport -->
            <div class="clearfix visible-xs"></div>

        </div>
    </div>
@endsection