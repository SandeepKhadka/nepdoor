<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'billing_id',
        'message',
        'status', 
        'start_date',
        'end_date'
    ];

    public function user_info(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function package_info(){
        return $this->hasOne(Package::class, 'id', 'package_id');
    }

    public function billing_info(){
        return $this->hasOne(Billing::class, 'id', 'billing_id');
    }

    public static function getRules(){
        return [
            'message' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'package_id' => 'nullable|exists:packages,id',
            // 'billing_id' => 'required|string',
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
