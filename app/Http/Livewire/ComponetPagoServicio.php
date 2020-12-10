<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Transaccion;
use App\Models\Movimiento;
use App\Models\User;
use App\Models\SaldoBilletera;
class ComponetPagoServicio extends Component
{
    public $servicio, $monto;

    protected $rules = [
        'servicio' => 'required',
        'monto' => 'required|numeric',
    ];
    protected $messages = [
        'servicio.required' => 'Debe Seleccionar un Servicio.',
        'monto.required' => 'Debe ingresar un monto a Pagar.',
        'monto.numeric' => 'Debe ingresar un monto en numeros.',
    ];

    public function render()
    {
        return view('livewire.componet-pago-servicio');
    }
    public function store(){
        $this->validate();
        $now = new \DateTime();
        Transaccion::insert([
            'fecha_transaccion'=> $now->format('Y-m-d H:i:s'),
            'id_billetera'=>Auth::user()->id_billetera,
            'tipo_transaccion'=> 'PS',
            'id_servicio'=> $this->servicio,
            'estado_transaccion'=> 'E',
            'usu_cre'=>'@admin',
            'fec_cre'=> $now->format('Y-m-d H:i:s')
        ]);
        $idtrans = Transaccion::where('tipo_transaccion','PS')->orderByDesc('id_transaccion')->get();
        Movimiento::insert([
            'fecha_movimiento'=> $now->format('Y-m-d H:i:s'),
            'id_transaccion'=> $idtrans[0]['id_transaccion'],
            'monto_transaccion'=> $this->monto,
            'saldo_anterior'=> Auth::user()->getSaldoAttribute(),
            'saldo_posterior'=> Auth::user()->getSaldoAttribute() - $this->monto,
            'usu_cre'=>'@admin',
            'fec_cre'=>$now->format('Y-m-d H:i:s')
        ]);
    }
}
