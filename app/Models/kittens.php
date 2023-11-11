<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kittens extends Model
{
    use HasFactory;
    protected $table = 'kittens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_kittens',
        'path',
        'foto',
        'something1_id'
    ];

    public function something1(): BelongsTo{
        return $this->belongsTo(something1::class);
    }
}
