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
                <x-mary-menu-item title="View Users" icon="o-eye" link="/admin/view-users" />
                <x-mary-menu-item title="View Donations" icon="o-gift" link="/admin/view-donations" /> <!-- Corrected typo in link -->
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
        </x-slot>
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
        <x-mary-table :headers="$headers" :rows="$users" striped >
            @foreach($users as $user)
                @scope('actions', $user)
                <div class="flex">
                    <x-mary-button icon="o-trash" wire:click="delete({{ $user->id }})" class="btn-sm" />
                    <x-mary-button icon="o-pencil" wire:click="edit({{ $user->id }})" class="btn-sm" />
                </div>
                @endscope
            @endforeach
        </x-mary-table>

        <x-mary-modal title="Edit User" wire:model="showEditModal">
            <x-mary-form wire:submit="update">
                <x-mary-input wire:model="name" label="Name" />
                <x-mary-input wire:model="email" label="E-mail Address" />
                <x-mary-input wire:model="phone" label="Phone" />

                <x-slot:actions>    
                    <x-mary-button wire:click="closeModal" class="btn btn-primary" label="Cancel" />
                    <x-mary-button type="submit" class="btn btn-success" label="Save" />
                </x-slot:actions>
            </x-mary-form>
        </x-mary-modal>
            {{-- <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verified At</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->usertype }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email_verified_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="confirmUserDeletion({{ $user->id }})" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>

                <!-- Add User Form -->
                <form wire:submit.prevent="addUser" class="mt-8">
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full">
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" wire:model="email" class="mt-1 block w-full">
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" wire:model="password" class="mt-1 block w-full">
                            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="usertype" class="block text-sm font-medium text-gray-700">User Type</label>
                            <input type="text" id="usertype" wire:model="usertype" class="mt-1 block w-full">
                            @error('usertype') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" id="phone" wire:model="phone" class="mt-1 block w-full">
                            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" id="address" wire:model="address" class="mt-1 block w-full">
                            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Add User</button>
                        </div>
                    </div>
                </form>
            </div> --}}

            <!-- Delete User Confirmation Modal -->
            {{-- @if($confirmingUserDeletion)
                <div class="fixed z-10 inset-0 overflow-y-auto" x-show="confirmingUserDeletion">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: exclamation -->
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.813-1.242 2.813-2.781V10.78c0-1.539-1.272-2.78-2.813-2.78H5.062C3.523 8 2.25 9.242 2.25 10.78v10.439c0 1.539 1.273 2.781 2.812 2.781z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Delete User</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to delete this user? All of the user's data will be permanently removed. This action cannot be undone.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button wire:click="deleteUser" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Delete User
                                </button>
                                <button wire:click="$set('confirmingUserDeletion', false)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}
        </x-slot>
    </x-mary-main>
</div>
