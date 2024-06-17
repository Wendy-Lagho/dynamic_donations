<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Need;
use App\Models\Donation;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use Toast;
    public $needsList;
    public $needsId;
    public $comments;
    public $date;
    // use Toast;
    public function mount()
{
    //   $this->needsList = Need::all()->toArray();
    // // $item_id = 1; // Assign a value to $item_id
    // // $needsList = Need::find($item_id)->toArray();
}

public function render()
{
    return view('livewire.dashboard');
}
public function submit()
{

    $need = Need::find($this->needsId);

    if ($need) {
        // Add to the donations database
        Donation::create([
            'user_id' => Auth::id(),
            'need_id' => $need->id, // Add this line to link to the need
            'comments' => $this->comments,
            'date' => $this->date,
            'status' => 'pending',
            'receipt_generated' => false,
        ]);

        // Optionally, update the need status
        $need->update(['status' => 'Donated']);

        // Display a success message
        session()->flash('message', 'Need successfully donated.');
    } else {
        // Display an error message
        session()->flash('error', 'Need not found.');
    }
}
}