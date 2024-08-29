<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }
}
