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
            <<x-mary-menu-item title="Manage Users" icon="o-eye" link="/admin/view-users" />
            <x-mary-menu-item title="Manage Donations" icon="o-gift" link="/admin/view-donations" /> <!-- Corrected typo in link -->
            <x-mary-menu-item title="Manage Needs" icon="o-list-bullet" link="/admin/view-needs" />
            <x-mary-menu-item title="Managae Blog" icon="o-newspaper" link="/admin/view-blog" />
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
        <x-mary-table :headers="$headers" :rows="$needs" striped>
            @foreach($needs as $need)
            {{-- <tr>
                <td>
                    <input type="text" wire:model.defer="needs.{{ $loop->index }}.name" class="form-control" />
                </td>
                <td>
                    <input type="number" wire:model.defer="needs.{{ $loop->index }}.quantity_required" class="form-control" />
                </td>
                <td>
                    <input type="text" wire:model.defer="needs.{{ $loop->index }}.unit" class="form-control" />
                </td>
                <td>
                    <select wire:model.defer="needs.{{ $loop->index }}.need_type" class="form-control">
                        <option value="food">Food</option>
                        <option value="clothing">Clothing</option>
                        <option value="shelter">Shelter</option>
                        <option value="education">Education</option>
                        <option value="health">Health</option>
                        <option value="other">Other</option> 
                    </select>
                </td>
                <td>
                    <input type="checkbox" wire:click="toggleFulfilled({{ $need->id }})" @if($need->fulfilled) checked @endif />
                </td>
                <td>
                    <div class="flex">
                        <x-mary-button icon="o-trash" wire:click="delete({{ $need->id }})" class="btn-sm bg-primary" />
                        <x-mary-button icon="o-pencil" wire:click="edit({{ $need->id }})" class="btn-sm bg-primary" />
                            <x-mary-button icon="o-bookmark" wire:click="save({{ $need->id }})" class="btn-sm bg-success" />   
                </div>
                </td>
            </tr> --}}
                @scope('actions', $need)
                <div class="flex">
                    <x-mary-button icon="o-trash" wire:click="delete({{ $need->id }})" class="btn-sm bg-primary" />
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $need->id }})" class="btn-sm bg-primary" />
                </div>
                @endscope
            @endforeach
        </x-mary-table>

        <x-mary-modal title="Edit Needs" wire:model="showEditModal">
            <x-mary-form wire:submit="update">
                <x-mary-input label="Name" wire:model.defer="need.name" />
                <x-mary-input label="Quantity Required" wire:model.defer="need.quantity_required" />
                <x-mary-input label="Unit" wire:model.defer="need.unit" />
                <x-mary-input label="Need Category" wire:model.defer="need.need_type" />
                <x-mary-input label="Fulfilled" wire:model.defer="need.fulfilled" />

                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>

        
            </x-mary-form>
        </x-mary-modal>

    </x-slot>
    
    </x-mary-main>
</div>
