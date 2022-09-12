<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'message','status'];

public function ticket_info(){
    return $this->hasOne(Ticket::class, 'id', 'ticket_id');
}

    public function getRules(){
        return [
            'message' => 'required|string',
            'ticket_id' => 'nullable|exists:tickets,id',
        ];
    }
}
