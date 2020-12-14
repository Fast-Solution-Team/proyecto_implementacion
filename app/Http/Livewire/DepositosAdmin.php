<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DepositosAdmin extends Component
{
    public $search;
    private $depositos;
    use WithPagination;
    public function render()
    {
        $this->depositos = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('servicios', 'servicios.ID_SERVICIO', '=', 'transacciones.ID_SERVICIO')
            ->join( 'users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')
            ->select('servicios.*','movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('users.id_billetera', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.identidad', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('users.direccion', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')
            ->paginate(5);




        // consulta sin los where
        $totaldepositosadmin = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','DP')->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countDepositosAdmin =$totaldepositosadmin->count();

        $totalDepositosAdmin= 0;
        foreach ($totaldepositosadmin as $value){
            $totalDepositosAdmin = $totalDepositosAdmin + $value->MONTO_TRANSACCION;

        }

        return view('livewire.depositos-admin')->with('depositos', $this->depositos)
            ->with('countDepositosAdmin', $countDepositosAdmin)->with('totalDepositosAdmin', $totalDepositosAdmin);
    }
}
