<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagoServicioCliente extends Component
{
    public $search;
    private $pagoscliente;
    public function render()
    {
        $this->pagoscliente = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('servicios', 'servicios.ID_SERVICIO', '=', 'transacciones.ID_SERVICIO')
            ->join( 'users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('servicios.*','movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('servicios.NOMBRE', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

        return view('livewire.pago-servicio-cliente')->with('pagoscliente', $this->pagoscliente);
    }
}
