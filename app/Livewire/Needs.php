<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination; // Import the WithPagination trait
use App\Models\Need; // Import the Need model

class Needs extends Component
{
    use WithPagination; // Use the WithPagination trait for pagination

    public function render()
    {
        // Retrieve records from the 'needs' table with pagination
        $needs = Need::paginate(10); // Adjust the number per page as needed

        // Pass the 'needs' data to the view with pagination
        return view('livewire.needs', ['needs' => $needs]);
    }
}
