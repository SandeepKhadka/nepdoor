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
            'title' => 'required|string',
            'message' => 'required|string',
            'ticket_id' => 'nullable|exists:tickets,id',
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
