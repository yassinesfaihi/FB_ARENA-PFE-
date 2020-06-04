<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'name', 'phone','adress'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class ,'client_id');
    }
}
