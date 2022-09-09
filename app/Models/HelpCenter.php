<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpCenter extends Model
{
    use HasFactory;

    protected $fillable = ['title','link','order_id','status'];

    public function getRules(){
        return [
            'title' => 'required|string',
            'link' => 'required|string',
            // 'order_id' => 'required|integer',
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
