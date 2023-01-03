<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Sampah extends Model
{
    use HasFactory;
    protected $table = 'sampah';

    public function User(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
