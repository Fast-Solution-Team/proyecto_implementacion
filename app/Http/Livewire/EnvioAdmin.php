<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EnvioAdmin extends Component
{
    public $search ,$name,$fecha_nac,$identidad,$sexo,$id_billetera,$email,$direccion;
    private $envios;
    use WithPagination;
    public function render()
    {
        $this->envios = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')


            ->where('users.id_billetera', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('users.name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('users.second_name', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('users.lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('users.second_lastname', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('users.identidad', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('transacciones.ID_BILLETERA_DESTINO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('movimientos_billeteras.FECHA_MOVIMIENTO', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('movimientos_billeteras.SALDO_ANTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')

            ->orwhere('movimientos_billeteras.SALDO_POSTERIOR', 'like', '%'.$this->search.'%')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')->paginate(5);

        // consulta sin los where
        $totalenviosadmin = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BILLETERA')
            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')
            ->where('transacciones.TIPO_TRANSACCION', '=','ED')->get();

        // count recibidos contiene todas las transaciones que se han hecho
        $countEnviosAdmin =$totalenviosadmin->count();

        $totalEnviosAdmin= 0;
        foreach ($totalenviosadmin as $value){
            $totalEnviosAdmin = $totalEnviosAdmin + $value->MONTO_TRANSACCION;

        }

        return view('livewire.envio-admin')->with('envios', $this->envios)
            ->with('countEnviosAdmin', $countEnviosAdmin)->with('totalEnviosAdmin', $totalEnviosAdmin);
    }

    public function detalleBiDestino($ID_BILLETERA_DESTINO){
        $cliente = User::where('ID_BILLETERA','=',$ID_BILLETERA_DESTINO)->get();

        $this->name =$cliente[0]['name'].' '.$cliente[0]['second_name'].' '.$cliente[0]['last_name'].' '.$cliente[0]['second_lastname'];
        $this->fecha_nac =$cliente[0]['fec_nac'];
        $this->identidad =$cliente[0]['identidad'];
        $this->sexo =$cliente[0]['sexo'];
        $this->id_billetera =$cliente[0]['id_billetera'];
        $this->email =$cliente[0]['email'];
        $this->direccion =$cliente[0]['direccion'];



    }
}
