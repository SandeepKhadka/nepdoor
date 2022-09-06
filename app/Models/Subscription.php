<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','package_id', 'billing_id', 'message','status', 'start_date', 'end_date'];

    public function getRules(){
        return [
            'message' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'package_id' => 'nullable|exists:packages,id',
            'billing_id' => 'nullable|exists:billings,id',
            'status' => 'required|in:Active,Inactive'
        ];
    }
}
