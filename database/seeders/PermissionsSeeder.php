<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now = new \DateTime();
//--------------------------------------------------------------------------------------
        $billetera_admin = DB::table('billeteras')->insert([
            'ID_BILLETERA'=>'0000000000000000',
            'FECHA_CREACION'=>$now->format('Y-m-d H:i:s'),
            'BILLETERA_ASIGNADA' => "S",
            'USU_CRE' => 'YO',
            'FEC_CRE' => $now->format('Y-m-d H:i:s'),
        ]);
        //creacion de super admin
        $super_admin_user = User::create([
        'name' => 'admin',
        'second_name' => 'second_name',
        'lastname' => 'lastname',
        'second_lastname' => 'second_lastname',
        'fec_nac' => $now->format('Y-m-d H:i:s'),
        'identidad' => '0000000000000',
        'sexo' => 'm',
        'email' => 'user.admin@email.com',
        'id_billetera' => '0000000000000000',
        'direccion' => 'direccion',
        'estado_cliente' => "a",
        'password' => Hash::make('user.password'),
    ]);

        $creacion_team = DB::table('teams')->insert([
            'user_id' => '1',
            'name' => 'admin',
            'personal_team' => '1'
    ]);
        $creacion_saldo = DB::table('saldo_billetera')->insert([
            'id_billetera' => '0000000000000000','saldo_billetera' => 0,
            'Fec_cre'=> $now->format('Y-m-d H:i:s'),'usu_cre' => "host"
        ]);

//        User::create(['name' => 'test', 'email' => 'test@gmail.com', 'password' => Hash::make('admin')]);

        $role = Role::create(['name' => 'super_admin']);
        $permission_array = [];
        array_push($permission_array, Permission::create(['name' => 'transacciones']));
        array_push($permission_array, Permission::create(['name' => 'ver_movientos']));

        array_push($permission_array, Permission::create(['name' => 'ver_retiro']));
        array_push($permission_array, Permission::create(['name' => 'ver_deposito']));
        array_push($permission_array, Permission::create(['name' => 'ver_pagoServicio']));
        array_push($permission_array, Permission::create(['name' => 'ver_enviosDinero']));
        array_push($permission_array, Permission::create(['name' => 'depositos']));
        array_push($permission_array, Permission::create(['name' => 'retiros']));

        array_push($permission_array, Permission::create(['name' => 'create_users']));
        array_push($permission_array, Permission::create(['name' => 'edit_users']));
        array_push($permission_array, Permission::create(['name' => 'delete_users']));
        array_push($permission_array, Permission::create(['name' => 'view_users']));

        array_push($permission_array, Permission::create(['name' => 'create_roles']));
        array_push($permission_array, Permission::create(['name' => 'edit_roles']));
        array_push($permission_array, Permission::create(['name' => 'delete_roles']));
        array_push($permission_array, Permission::create(['name' => 'view_roles']));
        $super_admin_user->assignRole($role->id);
        $role->syncPermissions($permission_array);
    }
}
