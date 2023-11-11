<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class something1 extends Model
{
    use HasFactory;
    protected $table = 'something1';
    protected $dates = ['tanggal_sesuatu'];
    protected $primaryKey = 'id_sesuatu';
    protected $fillable = [
        'nama_sesuatu',
        'nilai_Sesuatu',
        'tanggal_sesuatu',
        'harga_sesuatu',
        'filename',
        'filepath'
    ];    

    public function kittens(): HasMany{
        return $this->hasMany(kittens::class, 'something1_id', 'id_sesuatu');
    }
}
