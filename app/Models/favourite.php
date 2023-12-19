<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'something1_id',
        'user_id',
        'rating'
    ];    

    public function something1() {
        return $this->belongsTo(something1::class);
    }
    
    public function users() {
        return $this->belongs(users::class);
    }
}
