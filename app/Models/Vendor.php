<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medicines(){
        return $this->hasMany(Medicine::class);
    }
}
