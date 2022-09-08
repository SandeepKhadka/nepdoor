<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['token_id','subs_id', 'title', 'message','status', 'priority', 'ticket_status'];

    public function getRules(){
        return [
            'title' => 'required|string',
            'token_id' => 'required|string',
            'message' => 'required|string',
            'subs_id' => 'nullable|exists:users,id',
            'priority' => 'required|in:Normal,Urgent',

        ];
    }
}
