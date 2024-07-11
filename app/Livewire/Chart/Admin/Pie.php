<?php

namespace App\Livewire\Chart\Admin;

use Livewire\Component;
use App\Models\Donation;

class Pie extends Component
{
    public $data;

    public function mount()
    {
        $statuses = Donation::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        $this->data = [
            'labels' => $statuses->pluck('status')->toArray(),
            'data' => $statuses->pluck('count')->toArray(),
        ];
    }

    public function render()
    {
        return view('livewire.chart.admin.pie');
    }
}
