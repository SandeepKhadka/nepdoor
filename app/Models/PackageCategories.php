<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategories extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'key',
        'status'
    ];

    public function getRules(){
        $rules = [
            'title' => 'required|string',
            'key'=> 'required|string',
            'status' => 'required|in:Active,Inactive',
        ];

        return $rules;
    }
}
