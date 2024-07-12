<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Need;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class ViewNeeds extends Component
{
    use WithPagination;
    use Toast;

    public $needId;
    public $needName;
    public $quantityRequired;
    public $unit;
    public $needType;
    public $fulfilled;
    public bool $showEditModal = false;

    public function delete($id)
    {
        Need::destroy($id);
        $this->success('Need deleted successfully');
    }
    public function edit($id)
    {
        $this->needId = $id;
        $need = Need::find($id);
        $this->needName = $need->name;
        $this->quantityRequired = $need->quantity_required;
        $this->unit = $need->unit;
        $this->needType = $need->need_type;
        $this->fulfilled = $need->fulfilled;
        $this->showEditModal = true;
    }
    public function update()
    {
        $need = Need::find($this->needId);
        $need->name = $this->needName;
        $need->quantity_required = $this->quantityRequired;
        $need->unit = $this->unit;
        $need->need_type = $this->needType;
        $need->fulfilled = $this->fulfilled;
        $need->save();
        $this->success('Need updated successfully');
        $this->showEditModal = false;
    }

    public function render()
    {
        return view('livewire.admin.view-needs');
    }
}
