<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
