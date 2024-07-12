<div>

    <x-mary-main full-width>
        {{-- SIDEBAR --}}
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

        {{-- The `$slot` goes here --}}
    <x-slot name="content">
            @php
            $users = \App\Models\User::all();

            $headers = [
                ['key' => 'id', 'label' => '#'],
                ['key' => 'name', 'label' => 'Name'],
                ['key' => 'email', 'label' => 'E-mail Address'],
                ['key' => 'usertype', 'label' => 'User Type'],
                ['key' => 'phone', 'label' => 'Phone'],
                ['key' => 'address', 'label' => 'Address'],
                ['key' => 'actions', 'label' => 'Actions'],
            ];
        @endphp

        <x-mary-header title="USERS" with-anchor separator />

        <x-mary-button label="Add User" icon="o-plus" wire:click="create" class="btn btn-primary" /> 
        <x-mary-table :headers="$headers" :rows="$users" striped>
            @foreach($users as $user)
                @scope('actions', $user)
                <div class="flex">
                    <x-mary-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $user->id }})" spinner class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-mary-table>

        <x-mary-modal title="Add User" wire:model="showCreateModal">
            <x-mary-form wire:submit.prevent="store">
                <x-mary-input wire:model="name" label="Name" />
                <x-mary-input wire:model="email" label="E-mail Address" />
                <x-mary-input wire:model="usertype" label="User Type" />
                <x-mary-input wire:model="phone" label="Phone" />
                <x-mary-input wire:model="address" label="Address" />
                <x-mary-input wire:model="password" label="Password" type="password" />
                <x-mary-input wire:model="password_confirmation" label="Confirm Password" type="password" />

                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-mary-form>
        </x-mary-modal>

        <x-mary-modal title="Edit User" wire:model="showEditModal">
            <x-mary-form wire:submit.prevent="update">
                <x-mary-input wire:model="name" label="Name" />
                <x-mary-input wire:model="email" label="E-mail Address" />
                <x-mary-input wire:model="usertype" label="User Type" />
                <x-mary-input wire:model="phone" label="Phone" />
                <x-mary-input wire:model="address" label="Address" />
                <x-mary-input wire:model="password" label="Password" type="password" />
                <x-mary-input wire:model="password_confirmation" label="Confirm Password" type="password" />

                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" spinner label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-mary-form>
        </x-mary-modal>
    </x-slot>
    </x-mary-main>
</div>
