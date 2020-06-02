<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $primaryKey = 'reservation_id';
    protected $fillable = [
        'type', 'start_date', 'color', 'end_date', 'client_id', 'pitch_id', 'reservation_id',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function pitch()
    {
        return $this->belongsTo(Pitch::class, 'pitch_id');
    }
}