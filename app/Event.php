<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //table name
    protected $table = "events";

    public $primaryKey = "id";
}
