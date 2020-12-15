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
    public $users;
    use WithPagination;
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.componente-usuario')->with('usuarios', $users);
    }
}
