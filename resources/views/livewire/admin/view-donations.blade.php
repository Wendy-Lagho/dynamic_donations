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
                <x-mary-menu-item title="Manage Users" icon="o-eye" link="/admin/view-users" />
                <x-mary-menu-item title="Manage Donations" icon="o-gift" link="/admin/view-donations" />
                <x-mary-menu-item title="Manage Needs" icon="o-list-bullet" link="/admin/view-needs" />
                <x-mary-menu-item title="Manage Blog" icon="o-newspaper" link="/admin/view-blog" />
                <x-mary-menu-item title="Notifications" icon="o-bell" link="/admin/admin-notifications" />
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
            $donations = \App\Models\Donation::with(['user', 'need'])->get();

            $headers = [
                ['key' => 'user.name', 'label' => 'Name'],
                ['key' => 'need.need_name', 'label' => 'Need'],
                ['key' => 'donation_date', 'label' => 'Date'],
                ['key' => 'quantity', 'label' => 'Quantity'],
                ['key' => 'unit', 'label' => 'Unit'],
                ['key' => 'status', 'label' => 'Status'],
                ['key' => 'receipt_sent', 'label' => 'Receipt Sent'],
                ['key' => 'comments', 'label' => 'Comments'],
                ['key' => 'admin_approved', 'label' => 'Approval'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
            @endphp

            <x-mary-header title="DONATIONS" with-anchor separator />
            <x-mary-table :headers="$headers" :rows="$donations" striped>
                @foreach($donations as $donation)
                    @scope('actions', $donation)
                    <div class="flex">
                        @if(!$donation->admin_approved)
                            <x-mary-button icon="o-check" wire:click="approve({{ $donation->id }})" class="btn-sm bg-success" />
                        @endif
                        <x-mary-button icon="o-trash" wire:click="delete({{ $donation->id }})" class="btn-sm bg-primary" />
                        <x-mary-button icon="o-pencil" wire:click="edit({{ $donation->id }})" class="btn-sm bg-primary" />
                    </div>
                    @endscope
                @endforeach
            </x-mary-table>

            <x-mary-modal title="Edit Donation" wire:model="showEditModal">
                <x-mary-form wire:submit.prevent="update">
                    <x-mary-input wire:model="donationDate" label="Donation Date" type="date" />
                    <x-mary-input wire:model="quantity" label="Quantity" />
                    <x-mary-input wire:model="unit" label="Unit" />
                    <x-mary-input wire:model="status" label="Status" />
                    <x-mary-input wire:model="receiptSent" label="Receipt Sent" type="checkbox" />
                    <x-mary-input wire:model="comments" label="Comments" type="textarea" />
                    <x-mary-input wire:model="adminApproved" label="Admin Approved" type="checkbox" />

                    <x-slot:actions>
                        <x-mary-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                        <x-mary-button type="submit" class="btn btn-success" label="Save" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-modal>
                
        </x-slot>
    </x-mary-main>
</div>
