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
     
                    <x-mary-menu-item title="Profile" icon="" link="#" />
                    <x-mary-menu-item title="History" icon="" link="#" />
                    <x-mary-menu-item title="Needs" icon="" link="#" />
                    <x-mary-menu-item title="Donate" icon="" link="#" />
                    <x-mary-menu-sub title="Settings" icon="">
                        <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                        <x-mary-menu-item title="Change Theme" icon="o-moon">
                            <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                        </x-mary-menu-item>
                    </x-mary-menu-sub>
                </x-mary-menu>
            </x-slot:sidebar>
     
            {{-- The `$slot` goes here --}}
            <x-slot:content>
            <x-mary-form wire:submit.prevent="save">
                <x-mary-header title="Donate" with-anchor separator />
                <x-mary-input label="Item" placeholder="Enter item" wire:model="name" />
                <x-mary-input label="Quantity" placeholder="Enter quantity" wire:model="quantity" />
                <x-mary-input label="Description" placeholder="description" wire:model="location" />
                <x-mary-input label="Date" placeholder="Enter location" wire:model="location" />

                
                <x-slot:actions>
                    <x-mary-button type="submit" label="Save" Route::get('/logout', function () {
                        $guards = array_keys(config('auth.guards'));
                    
                        foreach ($guards as $guard) {
                            {{-- if (auth()->guard($guard)->check()) {
                                auth()->guard($guard)->logout(); --}}
                            }
                        }
                    
                        return redirect('/');
                    {{-- })->foreach ($guards as $guard) {
                        if (auth()->guard($guard)->check()) {
                            auth()->guard($guard)->logout(); --}}
                        }
                    }
                
                    return redirect('/');
                {{-- })->name('logout'); --}}
                
                require __DIR__.'/auth.php'; />
                </x-slot:actions>

                {{-- <x-mary-dropdown label="Settings" class="btn-outline">
                    
                    <x-mary-menu-item title="Close after click" />
                 
                    <x-mary-menu-separator />
                 
                    
                    <x-mary-menu-item title="Keep open after click" @click.stop="alert('Keep open')" />
                 
                    
                    <x-mary-menu-item title="Call wire:click" wire:click.stop="delete" />
                 
                    <x-mary-menu-separator />
                 
                    <x-mary-menu-item @click.stop="">
                        <x-mary-checkbox label="Activate" />
                    </x-mary-menu-item>
                 
                    <x-mary-menu-item @click.stop="">
                        <x-mary-toggle label="Sleep mode" right />
                    </x-mary-menu-item>
                </x-mary-dropdown> 

                --}}
            </x-mary-form>
            </x-slot:content>
        </x-mary-main>
    </div>
    