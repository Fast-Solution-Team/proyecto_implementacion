<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DepositosCliente extends Component
{
    public $search;
    private $depositoscliente;
    public function render()
    {
        $this->depositoscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('servicios', 'servicios.ID_SERVICIO', '=', 'transacciones.ID_SERVICIO')
            ->join( 'users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')
            ->select('servicios.*','movimientos_billeteras.*','transacciones.*' ,'users.*')->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

        return view('livewire.depositos-cliente')->with('depositoscliente', $this->depositoscliente);    }
}
