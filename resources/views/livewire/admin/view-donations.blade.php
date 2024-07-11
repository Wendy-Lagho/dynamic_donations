<div>
    <x-mary-main full-width>
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
        <x-mary-menu activate-by-route>
            {{-- User --}}
            @if($user = auth()->user())
                <x-mary-menu-separator />
                <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded"></x-mary-list-item>
                <x-mary-menu-separator />
            @endif
            <x-mary-menu-item title="View Users" icon="o-eye" link="/admin/view-users" />
            <x-mary-menu-item title="View Donations" icon="o-gift" link="/admin/view-donatios" />
            <x-mary-menu-item title="View Needs" icon="o-list-bullet" link="/admin/view-needs" />
            <x-mary-menu-item title="View Blog" icon="o-newspaper" link="/admin/view-blog" />
            <x-mary-menu-item title="Notifications" icon="o-cog-6-tooth" link="/admin/notifications" />
            <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                <x-mary-menu-item title="Change Theme" icon="o-moon">
                    <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                </x-mary-menu-item>
            </x-mary-menu-sub>
        </x-mary-menu>
    </x-slot:sidebar>

    <x-slot name="content">
        @php
        $donations = \App\Models\Donation::all();

        $headers = [
           // ['key' => 'id', 'label' => '#'],
            ['key' => 'user.name', 'label' => 'Name'],
            ['key' => 'need.name', 'label' => 'Need'],
            ['key' => 'donation_date', 'label' => 'Date'],
            ['key' => 'quantity', 'label' => 'Quantity'],
            ['key' => 'unit', 'label' => 'Unit'],
            ['key' => 'status', 'label' => 'Status'],
            ['key' => 'receipt_sent', 'label' => 'Receit Sent'],
            ['key' => 'comments', 'label' => 'Comments'],
            ['key' => 'admin_approved', 'label' => 'Approval'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
        @endphp

        <x-mary-header title="DONATIONS" with-anchor separator />
        <x-mary-table :headers="$headers" :rows="$donations" striped >
            @foreach($donations as $donation)
                @scope('actions', $donation)
                <div class="flex">
                    <x-mary-button icon="o-trash" wire:click="delete({{ $donation->id }})" class="btn-sm" />
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $donation->id }})" class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-mary-table>
            
    </x-slot>
</x-mary-main>
</div>
