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
        
        {{-- Be like water. --}}

        <x-slot:content>
                @if($user = auth()->user())
                    {{-- Check if there are any donations --}}
                    @if($donations->isNotEmpty())
                        <div class="p-4">
                            <h2 class="font-semibold text-xl mb-4">Donation History</h2>
                            <ul class="list-disc space-y-2">
                                @foreach($donations as $donation)
                                    <li>
                                        <div class="flex justify-between">
                                            <span>{{ $donation->created_at->format('M d, Y') }}</span>
                                            <span>${{ number_format($donation->amount, 2) }}</span>
                                        </div>
                                        @if($donation->message)
                                            <div class="text-sm text-gray-600 mt-1">
                                                Message: {{ $donation->message }}
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="p-4">
                            <h2 class="font-semibold text-xl">Donation History</h2>
                            <p class="mt-4">You have not made any donations yet.</p>
                        </div>
                    @endif
                @endif
        </x-slot:content>

    </x-mary-main>
</div>
