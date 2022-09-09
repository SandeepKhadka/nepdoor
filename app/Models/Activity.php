<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','content','status'];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getRules(){
        return [
            'title' => 'required|string',
            'content' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
