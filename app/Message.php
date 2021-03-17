<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'nome_paziente',
        'testo_messaggio',
    ];

}
