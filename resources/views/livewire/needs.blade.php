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
            
            <div class="overflow-x-auto">
                <div class="p-4">
                    <h2 class="font-semibold text-primary mb-4">Needs List</h2>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden"> <!-- Added shadow-xl for pronounced shadow -->
                        <table class="min-w-full table-auto">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Need Name</th>
                                    <th class="px-4 py-2">Quantity Required</th>
                                    <th class="px-4 py-2">Unit</th>
                                    <th class="px-4 py-2">Need Type</th>
                                    <th class="px-4 py-2">Fulfilled</th>
                                    <th class="px-4 py-2">Created At</th>
                                    <th class="px-4 py-2">Updated At</th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary">
                                @foreach ($needs as $need)
                                <tr>
                                    <td class="px-4 py-2">{{ $need->id }}</td>
                                    <td class="px-4 py-2">{{ $need->need_name }}</td>
                                    <td class="px-4 py-2">{{ $need->quantity_required }}</td>
                                    <td class="px-4 py-2">{{ $need->unit }}</td>
                                    <td class="px-4 py-2">{{ $need->need_type }}</td>
                                    <td class="px-4 py-2">{{ $need->fulfilled ? 'Yes' : 'No' }}</td>
                                    <td class="px-4 py-2">{{ $need->created_at->toFormattedDateString() }}</td>
                                    <td class="px-4 py-2">{{ $need->updated_at->toFormattedDateString() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-slot:content>
        
        
        
        
    </x-mary-main>
</div>
