<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationships';

    protected $fillable = ['cid', 'mid'];

    public $timestamps = false;

    public function meta()
    {
        return $this->hasOne('App\Meta', 'mid', 'mid');
    }
}
