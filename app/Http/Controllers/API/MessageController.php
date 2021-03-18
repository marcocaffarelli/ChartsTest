<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Message as MessageResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Message;

class MessageController extends Controller
{


    public function index(){
        return MessageResource::collection(Message::all());
    }
    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::parse($date)->format('M-Y');
    // }
}
