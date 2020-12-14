<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagoServicioCliente extends Component
{
    public $search;
    private $pagoscliente;
    use WithPagination;
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
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->paginate(5);

        // consulta sin los where
        $totalpagos = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')
            ->where('users.id_billetera', '=', Auth::user()->id_billetera)->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countPagos =$totalpagos->count();

        $totalPagos= 0;
        foreach ($totalpagos as $value){
            $totalPagos = $totalPagos + $value->MONTO_TRANSACCION;

        }

        return view('livewire.pago-servicio-cliente')->with('pagoscliente', $this->pagoscliente)
            ->with('countPagos', $countPagos)->with('totalPagos', $totalPagos);    }
}
