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
        $this->notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
    }

    public function markAsRead($notificationId)
    {
        $notification = Notification::find($notificationId);
        if ($notification && $notification->notifiable_id == Auth::id()) {
            $notification->markAsRead();
            $this->notifications = Auth::user()->notifications()->orderBy('created_at', 'desc')->get();
        }
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => $this->notifications,
        ]);
    }
}