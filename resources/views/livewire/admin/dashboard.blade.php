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
                <x-mary-menu-item title="View Users" icon="o-eye" link="" />
                <x-mary-menu-item title="View Donations" icon="o-gift" link="" />
                <x-mary-menu-item title="View Needs" icon="o-list-bullet" link="" />
                <x-mary-menu-item title="View Blog" icon="o-newspaper" link="" />
                <x-mary-menu-item title="Notifications" icon="o-cog-6-tooth" link="" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                    <x-mary-menu-item title="Change Theme" icon="o-moon">
                        <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                    </x-mary-menu-item>
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        <x-slot:content>
            <div class="flex-1">
                <div class="content-wrapper p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-brown-500 text-white rounded-lg shadow-lg p-6">
                            <div class="relative">
                                <h4 class="font-semibold text-lg mb-2">Weekly Donations <i class="mdi mdi-currency-usd mdi-24px float-right"></i></h4>
                                <h2 class="text-3xl font-bold mb-3">$ 15,000</h2>
                                <p class="text-sm">Increased by 60%</p>
                            </div>
                        </div>
                        <div class="bg-beige-500 text-black rounded-lg shadow-lg p-6">
                            <div class="relative">
                                <h4 class="font-semibold text-lg mb-2">New Donors <i class="mdi mdi-account-outline mdi-24px float-right"></i></h4>
                                <h2 class="text-3xl font-bold mb-3">45</h2>
                                <p class="text-sm">Decreased by 10%</p>
                            </div>
                        </div>
                        <div class="bg-brown-700 text-white rounded-lg shadow-lg p-6">
                            <div class="relative">
                                <h4 class="font-semibold text-lg mb-2">Active Campaigns <i class="mdi mdi-bullhorn mdi-24px float-right"></i></h4>
                                <h2 class="text-3xl font-bold mb-3">12</h2>
                                <p class="text-sm">Increased by 5%</p>
                            </div>
                        </div>
                    </div>

                    <div>
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
                                                <th class="py-2 px-4">Actions</th>
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
                                                    <td class="py-3 px-4">
                                                        @if(!$donation->admin_approved)
                                                            <button wire:click="approveDonation({{ $donation->id }})" class="bg-green-500 text-white px-3 py-1 rounded">Approve</button>
                                                        @else
                                                            <span class="text-green-500">Approved</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <div class="p-4">
                                <h2 class="font-semibold text-primary">Donation History</h2>
                                <p class="mt-4 text-secondary">There are no donations yet.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-slot:content>
    </x-mary-main>
</div>
