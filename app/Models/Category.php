<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


      //One to many relation User to Post
      public function medicines(){
        return $this->hasMany(Medicine::class);
    }
}
