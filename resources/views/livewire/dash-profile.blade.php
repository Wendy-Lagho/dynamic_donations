<div>
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-menu-separator />
 
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                        
                    </x-mary-list-item>
 
                    <x-mary-menu-separator />
                @endif
 
                <x-mary-menu-item title="Profile" icon="o-eye" link="/dash-profile" />
                <x-mary-menu-item title="History" icon="o-clock" link="/history" />
                <x-mary-menu-item title="Notifications" icon="o-cog-6-tooth" link="/notifications" />
                <x-mary-menu-item title="Donate" icon="o-gift" link="#donate" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                <x-mary-menu-item title="Change Theme" icon="o-moon">
                <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                </x-mary-menu-item>
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>
 

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            <div class="p-4">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form wire:submit.prevent="updateProfile" class="space-y-4">
                    <div class="form-group">
                      <label for="name" class="block text-sm font-medium text-primary">Name</label>
                      <input type="text" id="name" wire:model.defer="name" placeholder="Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                      focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 bg-white" required>
                      @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                      <label for="email" class="block text-sm font-medium text-primary">Email</label>
                      <input type="email" id="email" wire:model.defer="email" placeholder="Email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                      focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 bg-white" required>
                      @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                      <label for="password" class="block text-sm font-medium text-primary">Password</label>
                      <input type="password" id="password" wire:model.defer="password" placeholder="Password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                      focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 bg-white" required>
                      @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Update Profile</button>
                  </form> 
            </div>
        </x-slot:content>
    </x-mary-main>
</div>