<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public $timestamps = false;

    public function setTimeProject($newTime) {
        $this->save(array('time',$newTime));
    }

}
