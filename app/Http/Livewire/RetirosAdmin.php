<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RetirosAdmin extends Component
{
    public $search;
    private $retiros;


    public function render()
    {

        $this->retiros = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')

            ->where('users.id_billetera', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.identidad', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('users.direccion', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')
            ->get();

        // consulta sin los where
        $totalretirosadmin = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','RT')->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countRetirosAdmin =$totalretirosadmin->count();

        $totalRetirosAdmin= 0;
        foreach ($totalretirosadmin as $value){
            $totalRetirosAdmin = $totalRetirosAdmin + $value->MONTO_TRANSACCION;

        }

        return view('livewire.retiros-admin')->with('retiros', $this->retiros)
            ->with('countRetirosAdmin', $countRetirosAdmin)->with('totalRetirosAdmin', $totalRetirosAdmin);    }
}
