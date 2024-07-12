<div>
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>
                @if($user = auth()->user())
                    <x-mary-menu-separator />
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                    </x-mary-list-item>
                    <x-mary-menu-separator />
                @endif
                <x-mary-menu-item title="Profile" icon="o-eye" link="/dash-profile" />
                <x-mary-menu-item title="History" icon="o-clock" link="/history" />
                <x-mary-menu-item title="Notifications" icon="o-bell" link="/notifications" />
                <x-mary-menu-item title="Needs" icon="o-list-bullet" link="/needs" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                    <x-mary-menu-item title="Change Theme" icon="o-moon">
                        <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                    </x-mary-menu-item>
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- CONTENT --}}
        <x-slot name="content">
            
            @php
            $headers = [
                // ['key' => 'id', 'label' => '#'],
                ['key' => 'need_name', 'label' => 'Name'],
                ['key' => 'quantity_required', 'label' => 'Need'],
                ['key' => 'unit', 'label' => 'Date'],
                ['key' => 'need_type', 'label' => 'Quantity'],
                ['key' => 'fulfilled', 'label' => 'Unit'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
            @endphp

            <x-mary-header title="NEEDS" with-anchor separator />
            <x-mary-table :headers="$headers" :rows="$needs" striped>
                @foreach($needs as $need)
                    @scope('actions', $need)
                    <div class="flex">
                        @if(!$need->fulfilled)
                            <input type="checkbox" wire:model="selectedNeeds.{{ $need->id }}" wire:change="handleNeedSelection({{ $need->id }})">
                        @endif
                    </div>
                    @endscope
                @endforeach
            </x-mary-table>

            <x-mary-button label="Donate" icon="o-gift" wire:click="openDonationModal" class="btn btn-primary" /> 

            <x-mary-modal title="Donate" wire:model="showEditModal">
                <x-mary-form wire:submit.prevent="makeDonation">
                    <x-mary-input wire:model="donation_date" />
                    <x-mary-input wire:model="quantity" />
                    <x-mary-input wire:model="status" />
                    <x-mary-input wire:model="comments" type="textarea" />

                    <x-slot:actions>
                        <x-mary-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                        <x-mary-button type="submit" class="btn btn-success" label="Donate" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-modal>

            <div class="mt-4">
                {{ $needs->links() }}
            </div>
        </x-slot>
    </x-mary-main>
</div>
