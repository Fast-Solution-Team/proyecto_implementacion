<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Traits\HasRoles;

class ComponenteUsuario extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        return view('livewire.componente-usuario', [
            'usuarios'=> DB::table('users')
            ->join('direcciones', 'users.identidad', '=', 'direcciones.identidad')
            ->join('saldo_billetera', 'users.id_billetera', '=', 'saldo_billetera.ID_BILLETERA')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->paginate(10)
        ]);
    }
}
