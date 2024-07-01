<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class Notifications extends Component
{
    public $notifications;

    public function mount()
    {
        $this->notifications = Notification::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    public function markAsRead($notificationId)
    {
        $notification = Notification::find($notificationId);
        if ($notification && $notification->user_id == Auth::id()) {
            $notification->update(['read_at' => now()]);
            $this->notifications = Notification::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        }
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
