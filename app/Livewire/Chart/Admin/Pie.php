<?php

namespace App\Livewire\Chart\Admin;

use Livewire\Component;
use App\Models\User;

class Pie extends Component
{
    public $data;

    public function mount()
    {
        $this->data = $this->lineChart();
    }

    public function lineChart()
    {
        $userCounts = User::query()
            ->selectRaw('usertype, COUNT(*) as count')
            ->groupBy('usertype')
            ->get()
            ->pluck('count', 'usertype');

        // Prepare the data for the chart
        $data = [
            'labels' => $userCounts->keys()->all(),
            'data' => $userCounts->values()->all(),
        ];

        return $data;
    }

    public function render()
    {
        return view('livewire.chart.admin.pie', ['data' => $this->data]);
    }
}
