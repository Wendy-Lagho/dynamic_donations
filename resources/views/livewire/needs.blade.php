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
            <x-mary-header title="NEEDS" with-anchor separator class="text-primary" />

            <div class="mb-4 flex space-x-4">
                <input wire:model.debounce.300ms="search" type="text" placeholder="Search needs..."
                    class="form-input">
                <select wire:model="needType" class="form-select">
                    <option value="">All Categories</option>
                    @foreach ($needTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <x-mary-table :headers="$headers" :rows="$needs" striped>
                @foreach ($needs as $need)
                    <tr>
                        <td>{{ $need->id }}</td>
                        <td>{{ $need->need_name }}</td>
                        <td>{{ $need->quantity_required }}</td>
                        <td>{{ $need->unit }}</td>
                        <td>{{ $need->need_type }}</td>
                    </tr>
                @endforeach
            </x-mary-table>

            <x-mary-button label="Donate" class="btn bg-primary text-white mt-4" wire:click="redirectToDonateForm" />

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
