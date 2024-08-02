<div>

    <x-mary-main full-width>
        <x-slot name="sidebar" drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
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
        </x-slot>

        <x-slot name="content">

            <x-form wire:submit.prevent="save">
                <x-header title="Add User" with-anchor separator />
                <x-input label="Name" placeholder="Enter name" wire:model="name" />
                <x-input label="Email" placeholder="Enter email" wire:model="email" />
                <x-input label="User Type" placeholder="Enter a type" wire:model="usertype" />
                <x-input label="Phone" placeholder="Enter phone" wire:model="phone" />
                <x-input label="Address" placeholder="Enter address" wire:model="address" />
                <x-input label="Password" placeholder="Enter password" wire:model="password" type="password" />
                <x-input label="Confirm Password" type="password" placeholder="Confirm password" wire:model="password_confirmation" />
                
                <x-slot:actions>
                    <x-button type="submit" label="Save" spinner save class="btn-primary" />
                </x-slot:actions>
            </x-form>
        </x-slot>
    </x-mary-main>
</div>
