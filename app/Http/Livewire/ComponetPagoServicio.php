<?php

namespace App\Http\Livewire;

use App\Saldo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Transaccion;
use App\Models\Movimiento;
use App\Models\User;
use App\Models\SaldoBilletera;
class ComponetPagoServicio extends Component
{
    public $servicio, $monto,$mensaje_modal,$servicio_pagar,$monto_pagar,$abrir_modal;

    protected $rules = [
        'servicio' => 'required',
        'monto' => 'required|numeric| min: 1',
    ];
    protected $messages = [
        'servicio.required' => 'Debe Seleccionar un Servicio.',
        'monto.required' => 'Debe ingresar un monto a Pagar.',
        'monto.numeric' => 'Debe ingresar un monto en numeros.',
        'monto.min' => 'No se aceptan numeros negativos.'
    ];

    public function render()
    {
        return view('livewire.componet-pago-servicio');
    }
    public function store(){
        if($this->validate()){
            $ser=DB::table('servicios')->select('nombre')->where('id_servicio', $this->servicio)->first();
            $this->abrir_modal = 'abrir';
            $this->mensaje_modal= 'Esta Seguro que quiere realizar el Siguiente pago:  ';
            $this->servicio_pagar = 'Servicio:'.'   '.$ser->nombre;
            $this->monto_pagar = 'Monto:'.'     '.$this->monto;
        }
    }
    public function confirmarPago(){
        if($this->validate()){
            $now = new \DateTime();
            $estado_billetera=DB::table('billeteras')->select('billetera_asignada')->where('id_billetera', Auth::user()->id_billetera)->first();
            $estado_cliente = DB::table('users')->select('estado_cliente')->where('id_billetera', Auth::user()->id_billetera)->first();

            if($estado_billetera->billetera_asignada == 'N'){
                session()->flash('error1', 'FALLO: La billetera no esta Asignada!!.');
            }
            if ($estado_cliente->estado_cliente == 'i'){
                session()->flash('error2', 'FALLO: Cliente Inactivo!!.');
            }
            if (Auth::user()->getSaldoAttribute() < $this->monto){
                session()->flash('error3', 'FALLO: La Billetera no Cuenta con Suficiente Dinero para Realizar el Pago!!.');
            }
            if($estado_billetera->billetera_asignada == 'S' && $estado_cliente->estado_cliente == 'a' && Auth::user()->getSaldoAttribute() >= $this->monto){
                Transaccion::insert([
                    'fecha_transaccion'=> $now->format('Y-m-d H:i:s'),
                    'id_billetera'=> Auth::user()->id_billetera,
                    'tipo_transaccion'=> 'PS',
                    'id_servicio'=>$this->servicio,
                    'estado_transaccion'=>'E',
                    'usu_cre'=>'@admin',
                    'fec_cre'=>$now->format('Y-m-d H:i:s')
                ]);

                $ide=DB::table('transacciones')->select('id_transaccion')->orderBy('id_transaccion', 'desc')->first();

                Movimiento::insert([
                    'fecha_movimiento'=> $now->format('Y-m-d H:i:s'),
                    'id_transaccion'=> $ide->id_transaccion,
                    'monto_transaccion'=> $this->monto,
                    'saldo_anterior'=> Auth::user()->getSaldoAttribute(),
                    'saldo_posterior'=> Auth::user()->getSaldoAttribute() - $this->monto,
                    'usu_cre'=>'@admin',
                    'fec_cre'=>$now->format('Y-m-d H:i:s')
                ]);

                DB::table('saldo_billetera')
                    ->where('id_billetera', Auth::user()->id_billetera)
                    ->update([
                        'saldo_billetera' => Auth::user()->getSaldoAttribute() - $this->monto,
                        'usu_mod'=>'@admin',
                        'fec_mod'=>$now->format('Y-m-d H:i:s')
                    ]);
                $this->abrir_modal = '';
                session()->flash('ok', 'Transaccion Efectuada Exitosamente.');
                return redirect('/tr/ps');
            }
        }
    }
    public function cerrarModal(){
        $this->abrir_modal = '';
    }
}
