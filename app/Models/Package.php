<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id','name','price','status'];

    public function getRules(){
        return [
            'name' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'nullable|exists:package_categories,id',
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
