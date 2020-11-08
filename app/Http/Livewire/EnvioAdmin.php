<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EnvioAdmin extends Component
{
    public $search ,$name,$fecha_nac,$identidad,$sexo,$id_billetera,$email,$direccion;
    private $envios;
    public function render()
    {
        $this->envios = DB::table('movimientos_billeteras')
            ->join('transacciones', 'movimientos_billeteras.ID_TRANSACCION', '=', 'transacciones.ID_TRANSACCION')
            ->join('users', 'users.id_billetera', '=', 'transacciones.ID_BillETERA')

            ->select('movimientos_billeteras.*','transacciones.*' ,'users.*')->where('movimientos_billeteras.MONTO_TRANSACCION', 'like', '%'.$this->search.'%')->where('transacciones.TIPO_TRANSACCION', '=','ED')->get();

        return view('livewire.envio-admin')->with('envios', $this->envios);    }

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
