<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Donation;
use Mary\Traits\Toast;
use Illuminate\Support\Facades\Hash;
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

    public function delete($id)
    {
        Donation::destroy($id);
        $this->success('Donation deleted successfully');
    }
    public function edit($id)
    {
        $this->donationId = $id;
        $donation = Donation::find($id);
        $this->userName = $donation->user->name;
        $this->needName = $donation->need->name;
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
        $donation = Donation::find($this->donationId);
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
        $donation = Donation::find($id);
        $donation->admin_approved = 1;
        $donation->save();
        $this->success('Donation approved successfully');
    }
    public function closeModal()
    {
        $this->showEditModal = false;
    }
    public function render()
    {
        $donations = Donation::paginate(10);
        
        return view('livewire.admin.view-donations');
    }
}
