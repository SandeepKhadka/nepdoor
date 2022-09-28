<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['amount','discount' ,'voucher','payment_status','status','billNo'];

    public static function getRules($act = 'add'){
        $rules = [
            'amount' => 'required|string',
            'discount' => 'nullable|integer',
            'voucher' => 'required|image|max:5120',
            // 'payment_status' => 'required|in:Paid,Unpaid',
            // 'status' => 'required|in:Active,Inactive'
        ];

        if ($act == 'update'){
            $rules['voucher'] = 'sometimes|image|max:5120';
        }

        return $rules;

    }
}
