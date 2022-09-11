<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'message','status'];

    public function getRules(){
        return [
            'message' => 'required|string',
            'ticket_id' => 'nullable|exists:tickets,id',
        ];
    }
}
