<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'message','status', 'priority', 'ticket_status', 'token_id'];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules(){
        return [
            'title' => 'required|string',
            // 'token_id' => 'nullable|string',
            'message' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'priority' => 'required|in:Normal,Urgent',
        ];
    }
}
