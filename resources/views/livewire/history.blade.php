<div>
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>
                {{-- User --}}
                @if($user = auth()->user())
                    <x-mary-menu-separator />
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded"></x-mary-list-item>
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

        {{-- CONTENT --}}
        <x-slot:content>
            <div class="flex-1">
                <div class="content-wrapper p-6">
                    @if($donations->isNotEmpty())
                        <div class="p-4">
                            <h2 class="font-semibold text-primary mb-4">Donation History</h2>
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="py-2 px-4">Date</th>
                                            <th class="py-2 px-4">Quantity</th>
                                            <th class="py-2 px-4">Unit</th>
                                            <th class="py-2 px-4">Status</th>
                                            <th class="py-2 px-4">Comments</th>
                                            {{-- Add Action column headers if needed --}}
                                        </tr>
                                    </thead>
                                    <tbody class="text-secondary">
                                        @foreach($donations as $donation)
                                            <tr class="border-b border-gray-200">
                                                <td class="py-3 px-4">{{ $donation->donation_date->format('M d, Y') }}</td>
                                                <td class="py-3 px-4">{{ $donation->quantity }}</td>
                                                <td class="py-3 px-4">{{ $donation->unit }}</td>
                                                <td class="py-3 px-4">{{ $donation->status }}</td>
                                                <td class="py-3 px-4">{{ $donation->comments ?: '-' }}</td>
                                                {{-- Add Action column if needed --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="p-4">
                            <h2 class="font-semibold text-primary">Donation History</h2>
                            <p class="mt-4 text-secondary">You have not made any donations yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </x-slot:content>

    </x-mary-main>
</div>
