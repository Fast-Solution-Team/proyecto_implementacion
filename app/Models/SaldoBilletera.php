<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoBilletera extends Model
{
    use HasFactory;

    protected $table = [
        'saldo_billetera'
    ];

    protected $fillable = [
        'ID_BILLETERA',
        'SALDO_BILLETERA',
        'USU_CRE',
        'FEC_CRE',
        'USU_MOD',
        'FEC_MOD'
    ];

    const CREATED_AT = 'USU_CRE';
    const UPDATED_AT = 'FEC_MOD';
    
    public $timestamps = true;

}