
function explode(time) {

    var sec;
    var d = time/86400;
    d=Math.floor(d);
    sec=d*86400;
    var h = (time-sec)/3600;
    h= Math.floor(h);
    sec=sec+h*3600;
    var m=(time-sec)/60;
    m=Math.floor(m);
    sec=sec+m*60;
    var s=time-sec;
    display(d,h,m,s);
}
function display(d,h,m,s)  {
    if(d>0)
        document.getElementById('day').innerHTML=d+"day(s)";
    if(h<10)
        document.getElementById('hou').innerHTML="0"+h+"h"
    else
        document.getElementById('hou').innerHTML=h+"h";
    if(m<10)
        document.getElementById('min').innerHTML=":0"+m+"m"
    else
        document.getElementById('min').innerHTML=":"+m+"m"
    if(s<10)
        document.getElementById('sec').innerHTML=":0"+s+"s";
    else
        document.getElementById('sec').innerHTML=":"+s+"s";

    document.getElementById('time').setAttribute("value",t);
}

function get (time) {
    t=t+1;
    explode(time);
    return time;
}


var clocktimer;
var t;
function start () {
    document.getElementById('data').innerHTML='';
    document.getElementById('btnstart').disabled=true;
    t =parseInt(document.getElementById('time').getAttribute("value"));
    explode(t);
    clocktimer = setInterval(function(){ get(t) },  1000);
}

function pause() {
    clearInterval(clocktimer);
    document.getElementById('btnstart').disabled=false;
}


function deleteProject(id) {
    var c=confirm('Are you sure you want to delete the project?');
    if(c) {
        window.location.href = "/home/projects/delete/"+id;
    }else {

    }
}

function finishProject(id) {
    var c=confirm('Are you sure you want to finish the project?');
    if(c) {
        window.location.href = "/home/projects/finish/"+id;
    }else {

    }
}

function searching(projects) {
    var text =document.getElementById('search').value;

    var innerDiv;
    var name;
    document.getElementById('project-list').innerHTML='';
    for(var i=0;i<=projects.length;i++) {
        name = projects[i].name.toUpperCase();
        if (name.search(text.toUpperCase()) != -1) {
            innerDiv = ' <a href="../home/' + projects[i].id + '">';
            if (projects[i].project_end != null)
                innerDiv += '<div class="success" >';
            else
                innerDiv += '<div class="panel-project">';
            innerDiv += '<b>Project Name:</b>' + projects[i].name + '<br>';
            if (projects[i].deadline != null)
                innerDiv += '<b>Deadline:</b>' + projects[i].deadline + '<br>';
            else
                innerDiv += '<b>Deadline:</b> No <br>';
            if (projects[i].project_end != null)
                innerDiv += '<b>End:</b>' + projects[i].project_end;
            innerDiv += '</div>';
            innerDiv += '</a>';
            document.getElementById('project-list').innerHTML += innerDiv;

        }
    }//tutaj jest blad nie wyswietla sie po petli nie mam pojecia dlaczego

    alert(document.getElementById('project-list').innerHTML);
}

function extend() {
    if(document.getElementById('description').value.length ==(45 || 85 ||125)) {
        $('textarea[id=description]').animate({
            height: '+=40px'
        })
    }




}
