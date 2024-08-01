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

        <x-slot name="content">

            <x-mary-header title="BLOGS" with-anchor separator class="text-primary font-['Telugu_MN']" />
            <x-mary-button label="Add Blog" icon="o-plus" wire:click="create" class="btn bg-primary text-white" />

            <div class="grid gap-6 ">
                @foreach ($blogs as $blog)
                    <div class="shadow-md rounded-lg p-6 w-full flex flex-col">
                        <h2 class="text-4xl text-primary font-bold mb-4">{{ $blog->title }}</h2>
                        @if ($blog->photo_path)
                            <img src="{{ Storage::url($blog->photo_path) }}" alt="{{ $blog->title }}"
                                class="w-full h-auto object-cover mb-4 rounded-lg">
                        @endif
                        <div class="flex-grow overflow-auto">
                            <!-- Use nl2br and e for preserving spaces and line breaks -->
                            <p class="text-gray">{!! nl2br(e($blog->content)) !!}</p>
                        </div>
                        <div class="mt-auto flex justify-end gap-2">
                            <x-mary-button wire:click="edit({{ $blog->id }})" label="Edit"
                                class="btn bg-primary text-white" />
                            <x-mary-button wire:click="delete({{ $blog->id }})" label="Delete"
                                class="btn btn-warning" />
                        </div>
                        {{-- <a href="{{ route('blog-name', $blog->id) }}" class="text-blue-600 hover:text-blue-800 font-semibold mt-auto">Read more</a> --}}
                    </div>
                @endforeach
            </div>

            {{ $blogs->links() }}

            <x-mary-modal title="Add Blog" wire:model="showCreateModal">
                <x-mary-form wire:submit.prevent="store">
                    <x-mary-input wire:model="title" label="Add Blog" />
                    <x-mary-textarea wire:model="content" label="Content" />
                    <x-mary-file wire:model="photo" label="Photo" />

                    <x-slot:actions>
                        <x-mary-button wire:click="$set('showCreateModal', false)" label="Cancel"
                            class="btn btn-primary" />
                        <x-mary-button type="submit" label="Save" class="btn btn-success" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-modal>

            <x-mary-modal title="Edit Blog" wire:model="showEditModal">
                <x-mary-form wire:submit.prevent="update">
                    <x-mary-input wire:model="title" label="Title" />
                    <x-mary-textarea wire:model="content" label="Content" />
                    <x-mary-file wire:model="photo" label="Photo" />

                    <x-slot:actions>
                        <x-mary-button wire:click="$set('showEditModal', false)" label="Cancel"
                            class="btn btn-primary" />
                        <x-mary-button type="submit" label="Save" class="btn btn-success" />
                    </x-slot:actions>
                </x-mary-form>
            </x-mary-modal>

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
        </x-slot>

    </x-mary-main>
</div>
