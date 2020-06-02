<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';
    protected $fillable = [
        'name', 'age','phone','state','member_id','avatar'
    ];
    public function academy(){
        return $this->belongsTo(Academy::class ,'academy_id');
    }
}
