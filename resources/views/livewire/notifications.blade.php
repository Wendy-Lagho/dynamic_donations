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
                <x-mary-menu-item title="Donate" icon="o-gift" link="/donate-form" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                <x-mary-menu-item title="Change Theme" icon="o-moon">
                <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                </x-mary-menu-item>
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>
        
        <x-slot:content>
               Be like water.

               <div class="p-4">
                <h2 class="text-lg font-semibold mb-4">Notifications</h2>
                <ul class="space-y-4">
                    @foreach($this->notifications as $notification)
                        <li class="p-4 rounded-lg shadow-md {{ $notification->read_at ? 'bg-gray-100' : 'bg-white' }}">
                            <div class="flex justify-between items-center">
                                <strong class="text-sm">{{ $notification->title }}</strong>
                                <button wire:click="markAsRead({{ $notification->id }})" class="btn btn-primary btn-xs">
                                    Mark as Read
                                </button>
                            </div>
                            <p class="mt-2 text-sm">{{ $notification->message }}</p>
                            <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
            
        </x-slot:content>

    </x-mary-main>
</div>
