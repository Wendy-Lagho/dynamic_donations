<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Need;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class ViewNeeds extends Component
{
    use WithPagination, Toast;

    public $needId;
    public $needName;
    public $quantityRequired;
    public $unit;
    public $needType;
    public $fulfilled;
    public $showCreateModal = false;
    public $showEditModal = false;


    public function create()
    {
        $this->reset();
        $this->showCreateModal = true;
    }

    public function store()
    {
        $this->validate(
            [
                'needName' => 'required',
                'quantityRequired' => 'required',
                'unit' => 'required',
                'needType' => 'required',
                'fulfilled' => 'required',
            ]
        );

        $need = new Need();
        $need->need_name = $this->needName;
        $need->quantity_required = $this->quantityRequired;
        $need->unit = $this->unit;
        $need->need_type = $this->needType;
        $need->fulfilled = $this->fulfilled;
        $need->save();

        $this->resetFields();
        $this->showCreateModal = false;
        $this->success('Need created successfully');
        $this->error('Failed to add need');

    }

    public function edit($id)
    {
        $this->needId = $id;
        $need = Need::find($id);

        if ($need) {
            $this->needName = $need->need_name;
            $this->quantityRequired = $need->quantity_required;
            $this->unit = $need->unit;
            $this->needType = $need->need_type;
            $this->fulfilled = $need->fulfilled;
            $this->showEditModal = true;
        } else {
            $this->error('Need not found');
        }
    }

    public function update()
    {
        $this->validate(
            [
                'needName' => 'required',
                'quantityRequired' => 'required',
                'unit' => 'required',
                'needType' => 'required',
                'fulfilled' => 'required',
            ]
        );

        $need = Need::find($this->needId);
        if ($need) {
            $need->need_name = $this->needName;
            $need->quantity_required = $this->quantityRequired;
            $need->unit = $this->unit;
            $need->need_type = $this->needType;
            $need->fulfilled = $this->fulfilled;
            $need->save();
            
            $this->showEditModal = false;
            $this->success('Need updated successfully');
        } else {
            $this->error('Failed to update need');
        }
    }

    public function delete($id)
    {
        Need::destroy($id);
        $this->success('Need deleted successfully');
    }
    public function closeModal()
    {
        $this->showEditModal = false;
        $this->showCreateModal = false;
    }

    public function resetFields()
    {
        $this->needName = '';
        $this->quantityRequired = '';
        $this->unit = '';
        $this->needType = '';
        $this->fulfilled = '';
    }
    public function render()
    {
        $needs = Need::all();
        return view('livewire.admin.view-needs', ['needs' => $needs]);
    }
}
