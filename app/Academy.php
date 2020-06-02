<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{    protected $primaryKey = 'academy_id';

    protected $fillable = [
        'name', 'pitch_id'
    ];

        public function pitch(){
        return $this->belongsTo(Pitch::class ,'pitch_id');
    }
    public function members(){
        return $this->hasMany(Member::class);
    }
    public function coachs(){
        return $this->hasMany(Coach::class);
    }
}
