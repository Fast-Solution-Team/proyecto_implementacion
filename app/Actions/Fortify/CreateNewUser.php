<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $text_billetera = "billeteras";
        $text_sys_secuencias = "sys_secuencias";
        $generar_billetera = DB::select('select f_generar_billetera(?)', [$text_billetera]);
        $actualizar_billeteras = DB::select('call p_actualizar_secuencia(?)', [$text_sys_secuencias]);
        $procesar = DB::select('call emoney_rebuild1.p_procesar_billeteras()');

        // consultamos la disponibilidad de billeteras
        $billeteras = DB::table('billeteras')->select('ID_BILLETERA','BILLETERA_ASIGNADA')->where('BILLETERA_ASIGNADA',"N")->first();
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'second_name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'second_lastname' => ['required', 'string', 'max:255'],
                'fec_nac' =>['required', 'date'],
                'identidad'=>['required', 'string', 'min:13', 'max:13', 'unique:users'],
                'sexo' => ['required', 'string', 'min:1', 'max:1'],
                'direccion' => ['required', 'string', 'max:255'],
                'municipio' => ['required', 'string', 'max:255'],
                'departamento' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
            ])->validate();

            return DB::transaction(function () use ($input) {
                // variable de la fecha
                $now = new \DateTime();

                //select, update, y insercion de billeteras
                $asignacion_billetera = DB::table('billeteras')->select('id_billetera')->where('BILLETERA_ASIGNADA',"N")->first();
                $actualizacion_billeteras = DB::table('billeteras')->where('id_billetera', $asignacion_billetera->id_billetera)
                    ->update([
                        'BILLETERA_ASIGNADA' => "S",
                        'Fec_mod' => $now->format('Y-m-d H:i:s'), 'usu_mod' => "host"
                    ]);

                //creamos el saldo del nuevo usuario
                $creacion_saldo = DB::table('saldo_billetera')->insert([
                    'id_billetera' => $asignacion_billetera->id_billetera,'saldo_billetera' => 0,
                    'Fec_cre'=> $now->format('Y-m-d H:i:s'),'usu_cre' => "host"
                ]);
                //Creamos la direccion
                $creacion_direccion = DB::table('direcciones')->insert([
                    'identidad' => $input['identidad'],
                    'departamento' => $input['departamento'],
                    'municipio' => $input['municipio'],
                    'Fec_cre'=> $now->format('Y-m-d H:i:s'),'usu_cre' => "host"
                ]);

                return tap(User::create([
                    'name' => $input['name'],
                    'second_name' => $input['second_name'],
                    'lastname' => $input['lastname'],
                    'second_lastname' => $input['second_lastname'],
                    'fec_nac' => $input['fec_nac'],
                    'identidad' => $input['identidad'],
                    'sexo' => $input['sexo'],
                    'email' => $input['email'],
                    'id_billetera' => $asignacion_billetera->id_billetera,
                    'direccion' => $input['direccion'],
                    'estado_cliente' => "a",
                    'password' => Hash::make($input['password']),
                ]), function (User $user) {
                    $this->createTeam($user);
                });
            });
        //insertar manualmente la billetera en users
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
