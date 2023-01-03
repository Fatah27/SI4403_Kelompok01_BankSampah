<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    public function sampah(){
        return $this->belongsTo(Sampah::class, 'sampah_id', 'id');
    }
}
