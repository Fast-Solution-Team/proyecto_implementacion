<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SaldoBilletera;
use App\Models\servicio;
use Illuminate\Support\Facades\DB;
class DepositoController extends Controller
{
    
    //
    public function index() {
        
        $datos = ['saldo'=>Auth::user()->getSaldoAttribute(),
        'usuario'=>  Auth::user()->name,
         'id' => Auth::user()->id_billetera];
        
        return view('livewire.transacciones.deposito_efectivo', $datos);
    
    }

   

    public function update(Request $request) {
        
        $idservicio = DB::select('SELECT ID_SERVICIO FROM emoney.servicios WHERE NOMBRE = "Deposito"');

        if(count($idservicio)==0){
            $fecha = Carbon::now();
            DB::insert('INSERT INTO emoney.servicios(NOMBRE, DESCRIPCION, ESTADO_SERVICIO, USU_CRE, FEC_CRE) 
            VALUES(?,?,?,?,?)',['Deposito','Servicio de deposito normal','A','su',$fecha]);

            $idservicio = DB::select('SELECT ID_SERVICIO FROM emoney.servicios WHERE NOMBRE = "Deposito"');
        }

        $v = \Validator::make($request->all(), [
            'cantidad_dp' => 'required|numeric'
        ]);

        if ($v->fails())
        {
            
            $var = "Monto invalido";
            echo "<script> alert('".$var."'); </script>";
        
            $datos = ['saldo'=>Auth::user()->getSaldoAttribute(),
            'usuario'=>  Auth::user()->name,
             'id' => Auth::user()->id_billetera];
            
            return view('livewire.transacciones.deposito_efectivo', $datos);
        }

     
        $saldobilletera = DB::select('SELECT SALDO_BILLETERA FROM emoney.saldo_billetera WHERE ID_BILLETERA = ?', [$request->id]);
    


        if($request->cantidad_dp >= 100){
            if($request->cantidad_dp >20000){
                $var = "Maximo deposito es de Lps. 20000.00";
                echo "<script> alert('".$var."'); </script>";
            
                $datos = ['saldo'=>Auth::user()->getSaldoAttribute(),
                'usuario'=>  Auth::user()->name,
                 'id' => Auth::user()->id_billetera]; 
                
                return view('livewire.transacciones.deposito_efectivo', $datos);
            }

            $monto_total= Auth::user()->getSaldoAttribute()+ $request->cantidad_dp;
        }else{
            $var = "Minimo deposito es de Lps. 100.00";
            echo "<script> alert('".$var."'); </script>";
        
            $datos = ['saldo'=>Auth::user()->getSaldoAttribute(),
            'usuario'=>  Auth::user()->name,
             'id' => Auth::user()->id_billetera];
            
            return view('livewire.transacciones.deposito_efectivo', $datos);
        }
        
        $update = DB::update('UPDATE emoney.saldo_billetera set SALDO_BILLETERA = ? where ID_BILLETERA = ?', [$monto_total,$request->id]);

        if($update > -1){
                $var = "Deposito exitoso";
                echo "<script> alert('".$var."'); </script>";

                $numtransa = DB::select('SELECT * FROM emoney.transacciones');
                $nummovimi = DB::select('SELECT * FROM emoney.movimientos_billeteras');
                $conteot = count($numtransa);
                $conteom = count($nummovimi);
                $mytime = Carbon::now();
                

                DB::insert('insert into emoney.transacciones(ID_TRANSACCION, FECHA_TRANSACCION, ID_BILLETERA, TIPO_TRANSACCION, ID_SERVICIO, ESTADO_TRANSACCION, USU_CRE, FEC_CRE) values (?,?,?,?,?,?,?,?)', [$conteot+1, $mytime,$request->id,'DP',$idservicio[0]->ID_SERVICIO,'A', 'su',$mytime]);
               
               
                DB::insert('insert into emoney.movimientos_billeteras( ID_MOVIMIENTO, FECHA_MOVIMIENTO, ID_TRANSACCION, MONTO_TRANSACCION, SALDO_ANTERIOR, SALDO_POSTERIOR, USU_CRE, FEC_CRE)
                 values (?,?,?,?,?,?,?,?)', [$conteom+1, $mytime,$conteot+1,$request->cantidad_dp,Auth::user()->getSaldoAttribute(),$monto_total, 'su',$mytime]);
               
                

                 $datos = ['saldo'=>Auth::user()->getSaldoAttribute(),
                 'usuario'=>  Auth::user()->name,
                  'id' => Auth::user()->id_billetera];
                 
                
                return view('livewire.transacciones.deposito_efectivo', $datos);
        }
        else{
           return 'fallo' ;
        }

    }

   

    


}
