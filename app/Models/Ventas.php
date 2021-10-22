<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    
    protected $table = "ventas";

    protected $filable = [
        'id', 'usuario_id', 'producto_id','cantidad','estatus_id','create_at', 'update_at'
    ];
}
