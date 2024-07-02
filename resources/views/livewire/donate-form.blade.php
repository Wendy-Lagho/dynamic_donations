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
            <div class="container mx-auto p-8">
                <h2 class="text-primary text-5xl mb-8 font-chalkduster">Donate</h2>
                <form wire:submit.prevent="submit" class="space-y-6">
                    <div class="form-control">
                        <label for="needs" class="label text-secondary">
                            <span class="label-text">Item</span>
                        </label>
                        <select id="needs" wire:model="selectedNeed" class="select select-bordered w-full text-secondary">
                            <option value="" class="text-gray">Select an item</option>
                            @foreach($needs as $need)
                                <option value="{{ $need->id }}">{{ $need->need_name }}</option>
                            @endforeach
                        </select>
                        @error('selectedNeed') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label for="quantity" class="label text-secondary">
                            <span class="label-text">Quantity</span>
                        </label>
                        <input type="number" id="quantity" wire:model="quantity" class="input input-bordered w-full" required>
                        @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label for="unit" class="label text-secondary">
                            <span class="label-text">Unit</span>
                        </label>
                        <input type="text" id="unit" wire:model="unit" class="input input-bordered w-full" placeholder="e.g., pieces, kilograms">
                        @error('unit') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label for="donation_date" class="label text-secondary">
                            <span class="label-text">Date</span>
                        </label>
                        <input type="date" id="donation_date" wire:model="donationDate" class="input input-bordered w-full" required>
                        @error('donationDate') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-control">
                        <label for="comments" class="label text-secondary">
                            <span class="label-text">Comments</span>
                        </label>
                        <textarea id="comments" wire:model="comments" class="textarea textarea-bordered w-full text-secondary" placeholder="Your comments here..."></textarea>
                        @error('comments') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Submit</button>
                </form>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-4">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </x-slot:content>
    </x-mary-main>
</div>
