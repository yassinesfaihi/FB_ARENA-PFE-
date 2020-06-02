<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $primaryKey = 'coach_id';
    protected $fillable = [
        'name', 'salary', 'hire_date', 'coach_id', 'avatar'
    ];
    public function academy()
    {
        return $this->belongsTo(academy::class, 'academy_id');
    }
}