<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ComponenteUsuario extends Component
{
    public $search;
    public $users;
    public $name, $email, $selected_id, $estado_cliente, $rol_asign, $rol;
    use WithPagination;
    public $updateMode = false;
//    protected $rules = [
//        'rol' => 'required'
//    ];
    public function render()
    {
        $users = User::paginate(10);
//        $all_roles = Role::all()->pluck('name');
        return view('livewire.componente-usuario')->with('usuarios', $users);
    }
    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->estado_cliente = null;
    }
    public function edit($id)
    {
        $record = User::findOrFail($id);
        $this->selected_id = $id;
        $this->estado_cliente = $record->estado_cliente;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->rol_asign = $record->getRoleNames()->toArray();
        $this->updateMode = true;
    }
    public function update()
    {
        $now = new \DateTime();
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'estado_cliente' => 'required|min:1|max:1',
            'email' => 'required|email:rfc,dns',
//            'rol' => 'required'
        ]);
        if ($this->selected_id) {
            $record = User::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'estado_cliente' => $this->estado_cliente,
                'email' => $this->email,
                'usu_mod' => Auth::user()->name,
                'fec_mod'=> $now->format('Y-m-d H:i:s')
            ]);
            $record->assignRole($this->rol);
            $this->resetInput();
            $this->updateMode = false;
        }
    }

}
