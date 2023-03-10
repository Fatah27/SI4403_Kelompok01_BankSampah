<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public function invoice(){
        return $this->hasMany(Invoice::class , 'order_id' , 'id');
    }

}
