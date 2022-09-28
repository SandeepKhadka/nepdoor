<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['cat_id','name','price','status','link'];

    public function cat_info(){
        return $this->hasOne(PackageCategories::class, 'id', 'cat_id');
    }

    public function getRules(){
        return [
            'name' => 'required|string',
            'price' => 'required|integer',
            'cat_id' => 'nullable|exists:package_categories,id',
            'link' => 'nullable|string'
            // 'status' => 'required|in:Active,Inactive'
        ];
    }
}
