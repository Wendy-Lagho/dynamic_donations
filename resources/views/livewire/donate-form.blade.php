<div>
    <x-mary-nav sticky full-width>
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <div class="text-primary">Dynamic Donations</div>
        </x-slot:brand>

        <x-slot:actions>
            <x-mary-button label="Dashboard" link="{{ route('dashboard') }}" class="btn-ghost btn-sm text-primary"
                responsive />
            <x-mary-button label="Need Catalogue" link="{{ route('needs') }}" class="btn-ghost btn-sm text-primary"
                responsive />
            <x-mary-button label="Donate" link="{{ route('donate-form') }}" class="btn-ghost btn-sm text-primary"
                responsive />
            <x-mary-button label="Blog" link="{{ route('blog-name') }}" class="btn-ghost btn-sm text-primary"
                responsive />
        </x-slot:actions>
    </x-mary-nav>

    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>
                @if ($user = auth()->user())
                    <x-mary-menu-separator />
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                        class="-mx-2 !-my-2 rounded">
                    </x-mary-list-item>
                    <x-mary-menu-separator />
                @endif
                <x-mary-menu-item title="Profile" icon="o-eye" link="/dash-profile" />
                <x-mary-menu-item title="History" icon="o-clock" link="/history" />
                <x-mary-menu-item title="Notifications" icon="o-bell" link="/notifications" />
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
            @if (session()->has('message'))
                <div class="alert alert-success mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <x-mary-header title="DONATE" with-anchor separator class="text-primary" />
            <x-mary-table :headers="$headers" :rows="$needs" striped>
                @foreach ($needs as $need)
                    @scope('actions', $need)
                        <div class="flex">
                            <input type="checkbox" wire:model="selectedNeeds" value="{{ $need->id }}">
                        </div>
                    @endscope
                @endforeach
            </x-mary-table>

            <x-mary-button label="Donate" icon="o-gift" wire:click="openDonationModal"
                class="btn bg-primary text-white" />

            <div class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Alternatively Donate Money</h3>
                <div class="flex space-x-2">
                    <x-mary-button label="$100" wire:click="setDonationAmount(100)" class="btn btn-outline"
                        :class="$donationAmount === 100 ? 'btn-primary' : ''" />
                    <x-mary-button label="$50" wire:click="setDonationAmount(50)" class="btn btn-outline"
                        :class="$donationAmount === 50 ? 'btn-primary' : ''" />
                    <x-mary-button label="$20" wire:click="setDonationAmount(20)" class="btn btn-outline"
                        :class="$donationAmount === 20 ? 'btn-primary' : ''" />
                    <x-mary-button label="Other" wire:click="showCustomAmountInput" class="btn btn-outline"
                        :class="$showCustomAmountInput ? 'btn-primary' : ''" />
                </div>
                @if ($showCustomAmountInput)
                    <div class="mt-2">
                        <x-mary-input label="Custom Amount" type="number" wire:model="donationAmount"
                            placeholder="Enter amount" />
                    </div>
                @endif
                <div class="mt-4">
                    <x-mary-button label="Proceed to PayPal" wire:click="paypal" class="btn btn-success"
                        :disabled="!$donationAmount" />
                </div>
            </div>

            <x-mary-modal title="Donate" wire:model="showDonationModal">
                <x-mary-form wire:submit.prevent="makeDonation">
                    @foreach ($selectedNeeds as $needId)
                        <h3 class="text-lg font-semibold mb-2">{{ $needs->firstWhere('id', $needId)->need_name }}</h3>
                        <x-mary-input label="Donation Date" type="date"
                            wire:model="donations.{{ $needId }}.donation_date" />
                        <x-mary-input label="Quantity" type="number"
                            wire:model="donations.{{ $needId }}.quantity" />
                        <x-mary-input label="Unit" wire:model="donations.{{ $needId }}.unit" />
                        <x-mary-input label="Comments" type="textarea"
                            wire:model="donations.{{ $needId }}.comments" />
                        <hr class="my-4">
                    @endforeach

                    <x-slot:actions>
                        <x-mary-button wire:click="closeDonationModal" class="btn btn-primary" spinner label="Cancel" />
                        <x-mary-button type="submit" class="btn btn-success" label="Donate" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-modal>

            <!-- Footer -->
            <footer class="w-full mt-5 bg-primary text-white px-4 py-8 rounded-lg">
                <div class="container mx-auto flex flex-wrap justify-between items-start">
                    <div class="footer-logo mb-4 md:mb-0 w-full md:w-1/3" style="height = 30px">
                        <img src="{{ asset('img/logo-text-white.png') }}" alt="Logo" class="max-h-48 w-auto"
                            style="max-width: 200px !important; max-height: 200px !important; width: auto !important; height: auto !important;">
                    </div>
                    <div class="footer-links mb-4 md:mb-0 w-full md:w-1/3">
                        <ul class="list-none p-0 m-0 flex flex-col space-y-2">
                            <li><a href="{{ route('dashboard') }}"
                                    class="text-white hover:underline font-['American_Typewriter']">Dashboard</a></li>
                            <li><a href="{{ route('needs') }}"
                                    class="text-white hover:underline font-['American_Typewriter']">Need Catalogue</a>
                            </li>
                            <li><a href="{{ route('donate-form') }}"
                                    class="text-white hover:underline font-['American_Typewriter']">Donate</a></li>
                            <li><a href="{{ route('blog-name') }}"
                                    class="text-white hover:underline font-['American_Typewriter']">Blog</a></li>
                        </ul>
                    </div>
                    <div class="footer-location text-right w-full md:w-1/3">
                        <p class="mb-1 font-['Telugu_MN']">Address: 123 Strathmore University, Nairobi, Kenya</p>
                        <p class="mb-1 font-['Telugu_MN']">Email: <a href="mailto:info@dynamicdonations.com"
                                class="text-white hover:underline">info@dynamicdonations.com</a></p>
                        <p class="mb-1 font-['Telugu_MN']">Phone: <a href="tel:+254712345678"
                                class="text-white hover:underline">+254 (0) 712 345 678</a></p>
                        <p class="mb-1 font-['Telugu_MN']">Copyright Wendy Lagho, Caleb Chemwa</p>
                        <p class="font-['Telugu_MN']">All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </x-slot:content>
    </x-mary-main>
</div>
