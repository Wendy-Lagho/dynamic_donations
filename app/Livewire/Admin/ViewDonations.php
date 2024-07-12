<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Donation;
use Mary\Traits\Toast;
use Livewire\WithPagination;

class ViewDonations extends Component
{
    use WithPagination;
    use Toast;

    public $donationId;
    public $userName;
    public $needName;
    public $donationDate;
    public $quantity;
    public $unit;
    public $status;
    public $receiptSent;
    public $comments;
    public $adminApproved;
    public bool $showEditModal = false;

    protected $rules = [
        'donationDate' => 'required|date',
        'quantity' => 'required|integer',
        'unit' => 'required|string|max:50',
        'status' => 'required|string|max:20',
        'receiptSent' => 'required|boolean',
        'comments' => 'nullable|string',
        'adminApproved' => 'required|boolean',
    ];

    public function delete($id)
    {
        Donation::destroy($id);
        $this->success('Donation deleted successfully');
    }

    public function edit($id)
    {
        $donation = Donation::findOrFail($id);

        $this->donationId = $donation->id;
        $this->userName = $donation->user->name;
        $this->needName = $donation->need->need_name;
        $this->donationDate = $donation->donation_date;
        $this->quantity = $donation->quantity;
        $this->unit = $donation->unit;
        $this->status = $donation->status;
        $this->receiptSent = $donation->receipt_sent;
        $this->comments = $donation->comments;
        $this->adminApproved = $donation->admin_approved;

        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate();

        $donation = Donation::findOrFail($this->donationId);

        $donation->donation_date = $this->donationDate;
        $donation->quantity = $this->quantity;
        $donation->unit = $this->unit;
        $donation->status = $this->status;
        $donation->receipt_sent = $this->receiptSent;
        $donation->comments = $this->comments;
        $donation->admin_approved = $this->adminApproved;

        $donation->save();

        $this->success('Donation updated successfully');
        $this->showEditModal = false;
    }

    public function approve($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->admin_approved = true;
        $donation->save();

        $this->success('Donation approved successfully');
    }

    public function closeModal()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        $donations = Donation::with(['user', 'need'])->paginate(10);

        return view('livewire.admin.view-donations', compact('donations'));
    }
}
