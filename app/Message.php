<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nome_paziente',
        'testo_messaggio',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('M-Y');
    }
}
