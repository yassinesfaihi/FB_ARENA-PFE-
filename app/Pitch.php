<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    protected $primaryKey = 'pitch_id';
    protected $fillable = [
        'name', 'capacity', 'price', 'state', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function academies()
{
    return $this->hasMany(Academy::class, 'pitch_id');
}
    public function reservations()
{
    return $this->hasMany(Reservation::class ,'pitch_id');
}
}