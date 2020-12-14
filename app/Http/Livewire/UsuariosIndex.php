<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.usuarios-index', [
            'usuarios'=>User::paginate(8)
        ]);
    }
}
