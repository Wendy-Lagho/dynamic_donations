<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Need;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class Needs extends Component
{
    use WithPagination;

    public $showEditModal = false;
    public $selectedNeeds = [];
    public $donationDetails = [];
    public $userId;

    public $need_id, $donation_date, $quantity, $unit, $status, $comments;

    protected $rules = [];

    public function openDonationModal($donationId = null)
    {
        $this->reset();
        $user_id = Auth::user()->id;

        // If a specific donation ID is provided, use it; otherwise, fetch the latest donation for the user
        $donation = $donationId ? Donation::find($donationId) : Donation::where('user_id', $user_id)->latest()->first();

        if ($donation) {
            $this->need_id = $donation->need_id;
            $this->donation_date = $donation->donation_date;
            $this->quantity = $donation->quantity;
            $this->unit = $donation->unit;
            $this->status = $donation->status;
            $this->comments = $donation->comments;
        }

        $this->showEditModal = true;

    }
    public function mount()
    {
        $this->userId = Auth::user()->id;
        $donations = Donation::where('user_id', $this->userId);
        $this->selectedNeeds = $donations->pluck('need_id')->toArray();
    }

    public function handleNeedSelection($needId)
    {
        if (isset($this->selectedNeeds[$needId])) {
            unset($this->selectedNeeds[$needId]);
        } else {
            $this->selectedNeeds[$needId] = true;
            $this->donationDetails[$needId] = [
                'quantity' => null,
                'unit' => '',
            ];
        }
    }

    public function makeDonation()
    {
        $this->validate([
            'donationDetails.*.quantity' => 'required|integer|min:1',
            'donationDetails.*.unit' => 'required|string|max:50',
        ]);

        foreach ($this->selectedNeeds as $needId => $isSelected) {
            if ($isSelected) {
                $need = Need::find($needId);

                // Save donation logic here
                $user = User::find($this->userId);
                $user->donations()->create([
                    'need_id' => $needId,
                    'quantity' => $this->donationDetails[$needId]['quantity'],
                    'unit' => $this->donationDetails[$needId]['unit'],
                    'comments' => '', // You can add comments handling if needed
                    'donation_date' => now(),
                    'status' => 'pending',
                    'receipt_sent' => false,
                    'admin_approved' => false,
                ]);
            }
        }

        $this->success('Donation submitted successfully.');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        $needs = Need::paginate(10);
        return view('livewire.needs', ['needs' => $needs]);
    }
}
