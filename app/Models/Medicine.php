<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\Comment;

class Medicine extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function carts()
    // {
    //     return $this->belongsTo(Cart::class);
    // }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
     //One to many relation User to Post
     public function carts(){
        return $this->hasMany(Medicine::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
