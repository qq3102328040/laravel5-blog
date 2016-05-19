<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $primaryKey = 'mid';

    protected $table = 'metas';

    protected $fillable = ['name', 'description', 'type', 'count'];

    public function scopeCategory($query){
        return $query->where(['type' => 'category']);
    }
}
