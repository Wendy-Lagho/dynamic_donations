<div>
    <!-- Navbar added at the top -->
    <x-mary-nav sticky full-width>
        <x-slot:brand>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
            <div class="text-primary">Dynamic Donations</div>
        </x-slot:brand>

        <x-slot:actions>
            <x-mary-button label="Dashboard" link="{{ route('admin.dashboard') }}" class="btn-ghost btn-sm text-primary"
                responsive />
            <x-mary-button label="Volunteer Activities" link="{{ route('admin.volunteer-activities') }}"
                class="btn-ghost btn-sm text-primary" responsive />
            <x-mary-button label="Blog" link="{{ route('admin.view-blog') }}" class="btn-ghost btn-sm text-primary"
                responsive />
        </x-slot:actions>
    </x-mary-nav>

    <!-- Existing content starts here -->
    <x-mary-main full-width>
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            <x-mary-menu activate-by-route>
                {{-- User --}}
                @if ($user = auth()->user())
                    <x-mary-menu-separator />
                    <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                        class="-mx-2 !-my-2 rounded"></x-mary-list-item>
                    <x-mary-menu-separator />
                @endif
                <x-mary-menu-item title="Manage Users" icon="o-eye" link="/admin/view-users" />
                <x-mary-menu-item title="Manage Donations" icon="o-gift" link="/admin/view-donations" />
                <!-- Corrected typo in link -->
                <x-mary-menu-item title="Manage Needs" icon="o-list-bullet" link="/admin/view-needs" />
                <x-mary-menu-item title="Manage Blog" icon="o-newspaper" link="/admin/view-blog" />
                <x-mary-menu-item title="Notifications" icon="o-bell" link="/admin/admin-notifications" />
                <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                    <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
                    <x-mary-menu-item title="Change Theme" icon="o-moon">
                        <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                    </x-mary-menu-item>
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        <x-slot:content>
            @forelse($unseenDonations as $donation)
                <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md mt-4"
                    role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" aria-hidden="true">
                                <title>Notification Icon</title>
                                <path
                                    d="M9 12v-2c0-.553-.585-1-1-1-.416 0-1 .447-1 1v2c0 .553.584 1 1 1 .415 0 1-.447 1-1zm1-6.105V6c0 .553.585 1 1 1 .416 0 1-.447 1-1V5.895c1.165-.413 2-1.51 2-2.895 0-1.657-1.343-3-3-3s-3 1.343-3 3c0 1.385.835 2.482 2 2.895zM10 18c4.418 0 8-3.582 8-8H2c0 4.418 3.582 8 8 8z" />
                            </svg>
                        </div>
                        <div>
                            @if ($donation->created_at->diffInDays(now()) >= 10 && $donation->status === 'pending')
                                <p class="font-bold text-red-600">Donation Pending for 10+ Days!</p>
                            @else
                                <p class="font-bold">New Donation Received!</p>
                            @endif
                            <p class="text-sm">
                                A donation of {{ $donation->quantity }} {{ $donation->unit }} was made on
                                {{ $donation->donation_date->format('F j, Y') }}.
                            </p>
                            <p class="text-sm mt-2">
                                <strong>Donated to:</strong> {{ $donation->need->need_name }}
                            </p>
                            <p class="text-sm">
                                <strong>Status:</strong> {{ ucfirst($donation->status) }}
                            </p>
                            @if ($donation->comments)
                                <p class="text-sm mt-2">
                                    <strong>Comments:</strong> {{ $donation->comments }}
                                </p>
                            @endif
                            <div class="mt-3">
                                <a href="{{ route('admin.view-donations', $donation->id) }}"
                                    class="text-blue-500 underline mr-4">View Details</a>
                                @if ($donation->created_at->diffInDays(now()) >= 10 && $donation->status === 'pending')
                                    <button wire:click="markAsStale({{ $donation->id }})"
                                        class="text-red-500 underline mr-4">Mark as Stale</button>
                                @endif
                                <button wire:click="markAsSeen({{ $donation->id }})"
                                    class="text-green-500 underline">Mark as Seen</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No new donations to show.</p>
            @endforelse
            @if (count($unseenDonations) == $limit)
                <div class="mt-4">
                    <button wire:click="loadMore"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Load More
                    </button>
                </div>
            @endif

            <!-- Footer added at the end of the content slot -->
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
