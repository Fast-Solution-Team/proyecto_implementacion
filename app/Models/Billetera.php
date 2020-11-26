<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billetera extends Model
{
    use HasFactory;
    protected $table = 'billeteras';
    protected $fillable = [
        'ID_BILLETERA'
    ];
}
