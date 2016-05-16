<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = ['title', 'text', 'author', 'last_edit_time'];

    protected $dates = ['last_edit_time'];

    public function belongsToUser(){
        return $this->belongsTo('\App\User', 'author', 'id');
    }

}
