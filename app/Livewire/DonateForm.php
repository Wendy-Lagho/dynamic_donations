<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Need;
use App\Models\Donation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DonateForm extends Component
{
    public $needs;
    public $selectedNeed;
    public $quantity;
    public $unit;
    public $donationDate;
    public $comments;

    protected $rules = [
        'selectedNeed' => 'required|exists:needs,id',
        'quantity' => 'required|integer|min:1',
        'unit' => 'required|string|max:50',
        'donationDate' => 'required|date',
        'comments' => 'nullable|string',
        
    ];

    protected $messages = [
        'selectedNeed.required' => 'A need must be selected.',
        'selectedNeed.exists' => 'The selected need does not exist.',
        'quantity.required' => 'The quantity is required.',
        'quantity.integer' => 'The quantity must be an integer.',
        'quantity.min' => 'The quantity must be at least 1.',
        'unit.required' => 'The unit is required.',
        'unit.string' => 'The unit must be a string.',
        'unit.max' => 'The unit must not exceed 50 characters.',
        'donationDate.required' => 'The donation date is required.',
        'donationDate.date' => 'The donation date is not a valid date.',
        'comments.string' => 'The comments must be a string.',
    ];

    public function mount()
    {
        $this->needs = Need::all();
    }

    public function submit()
    {
        try {
        $this->validate();

        Donation::create([
            'user_id' => Auth::id(),
            'need_id' => $this->selectedNeed,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'donation_date' => $this->donationDate,
            'comments' => $this->comments,
            'status' => 'pending',
            'receipt_sent' => false,
            'admin_approved' => false,
        ]);

        session()->flash('message', 'Donation submitted successfully!');
        } catch (\Exception $e) {
                session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.donate-form');
    }
}
