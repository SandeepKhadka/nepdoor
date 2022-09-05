<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','subject','message','status'];

    public function getRules(){
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'subject' => 'required|string',
            'message' => 'required|string',
            'status' => 'required|in:Active,Inactive'
        ];
    }
}
