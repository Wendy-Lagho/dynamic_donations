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
            <x-mary-menu-item title="Manage Donations" icon="o-gift" link="/admin/view-donations" /> <!-- Corrected typo in link -->
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
        $needs = \App\Models\Need::all();

        $headers = [
            ['key' => 'id', 'label' => '#'],
            ['key' => 'need_name', 'label' => 'Need'],
            ['key' => 'quantity_required', 'label' => 'Quantity Required'],
            ['key' => 'unit', 'label' => 'Unit'],
            ['key' => 'need_type', 'label' => 'Need Category'],
            ['key' => 'fulfilled', 'label' => 'Fulfilled'],
            ['key' => 'actions', 'label' => 'Actions'],
        ];
        @endphp

        <x-mary-header title="NEEDS" with-anchor separator />
        <x-mary-button label="Add Need" icon="o-plus" wire:click="create" class="btn bg-primary text-white" /> 

        <x-mary-table :headers="$headers" :rows="$needs" striped>
            @foreach($needs as $need)
                @scope('actions', $need)
                <div class="flex">
                    <x-mary-button icon="o-trash" wire:click="delete({{ $need->id }})" class="btn-sm bg-primary" />
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $need->id }})" class="btn-sm bg-primary" />
                </div>
                @endscope
            @endforeach
        </x-mary-table>

        <x-mary-modal title="Add Need" wire:model="showCreateModal">
            <x-mary-form wire:submit.prevent="store">
                <x-mary-input wire:model="needName" label="Need Name" />
                <x-mary-input wire:model="quantityRequired" label="Quantity Required" />
                <x-mary-input wire:model="unit" label="Unit" />
                <x-mary-input wire:model="needType" label="Need Category" />
                <x-mary-input wire:model="fulfilled" label="Fulfilled" />

                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" spinner label="Save" />
                </x-slot:actions>
            </x-mary-form>
        </x-mary-modal>

        <x-mary-modal title="Edit Needs" wire:model="showEditModal">
            <x-mary-form wire:submit="update">
                <x-mary-input label="Name" wire:model="needName" />
                <x-mary-input label="Quantity Required" wire:model="quantityRequired" />
                <x-mary-input label="Unit" wire:model="unit" />
                <x-mary-input label="Need Category" wire:model="needType" />
                <x-mary-input label="Fulfilled" wire:model="fulfilled" />

                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
        
            </x-mary-form>
        </x-mary-modal>

    </x-slot>
    
    </x-mary-main>
</div>
