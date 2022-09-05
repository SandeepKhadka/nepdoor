<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['amount','voucher','payment_status','status'];

    public function getRules(){
        return [
            'amount' => 'required|string',
            'voucher' => 'required|image|max:5120',
            // 'payment_status' => 'nullable|exists:users,id',
            'status' => 'required|in:Active,Inactive'
        ];
    }
}
