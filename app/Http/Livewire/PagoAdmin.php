<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagoAdmin extends Component
{
    public $search;
    private $pagos;
    use WithPagination;
    public function render()
    {
        $this->pagos = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('servicios', 'servicios.ID_SERVICIO', '=', 'transacciones.ID_SERVICIO')
            ->join( 'users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('servicios.*','movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('users.id_billetera', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.identidad', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('users.direccion', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('servicios.NOMBRE', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')->paginate(5);

        // consulta sin los where
        $totalpagosadmin = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','PS')->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countPagosAdmin =$totalpagosadmin->count();

        $totalPagosAdmin= 0;
        foreach ($totalpagosadmin as $value){
            $totalPagosAdmin = $totalPagosAdmin + $value->MONTO_TRANSACCION;

        }

        return view('livewire.pago-admin')->with('pagos', $this->pagos)
            ->with('countPagosAdmin', $countPagosAdmin)->with('totalPagosAdmin', $totalPagosAdmin);
    }
}
