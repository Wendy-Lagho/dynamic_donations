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
            {{-- <div class="container mx-auto p-8">
                <h2 class="text-primary text-5xl mb-8 font-chalkduster">Donate</h2>
                <form wire:submit.prevent="submit" class="space-y-6">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="needs" class="label text-primary">Item</label>
                            <select id="needs" wire:model="selectedNeed" class="select select-bordered w-full text-black">
                                <option value="" class="text-gray">Select an item</option>
                                @foreach($needs as $need)
                                    <option value="{{ $need->id }}">{{ $need->need_name }}</option>
                                @endforeach
                            </select>
                            @error('selectedNeed') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="quantity" class="label text-primary">Quantity</label>
                            <input type="number" id="quantity" wire:model="quantity" class="input input-bordered w-full text-white" required>
                            @error('quantity') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label for="unit" class="label text-primary">Unit</label>
                            <input type="text" id="unit" wire:model="unit" class="input input-bordered w-full text-white" placeholder="e.g., pieces, kilograms">
                            @error('unit') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label for="donation_date" class="label text-primary">Date</label>
                            <input type="date" id="donation_date" wire:model="donationDate" class="input input-bordered w-full text-black" required>
                            @error('donationDate') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-control">
                        <label for="comments" class="label text-secondary">
                            <span class="label-text">Comments</span>
                        </label>
                        <textarea id="comments" wire:model="comments" class="textarea textarea-bordered w-full text-secondary" placeholder="Your comments here..."></textarea>
                        @error('comments') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Submit
                    </button>
                </form>

                <div class="form-control mt-4">
                    <form action="{{ route('paypal') }}" method="POST">
                        @csrf
                        <button class="btn bg-blue-800 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded" type="submit">
                            Pay with PayPal
                        </button>
                    </form>
                </div>  

                
                @if (session()->has('message'))
                    <div class="alert alert-success mt-4">
                        {{ session('message') }}
                    </div>
                @endif
            </div> --}}

            <!-- donate-form.blade.php -->

<!-- resources/views/livewire/donate-form.blade.php -->
        <div>
            <h2>Donate to {{ $selectedNeed->need_name }}</h2>

            <form wire:submit.prevent="submitDonation">
                <!-- Donation form fields -->
                <div>
                    <label for="donation_date">Donation Date</label>
                    <input type="date" id="donation_date" wire:model.defer="donation_date">
                    @error('donation_date') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" wire:model.defer="quantity">
                    @error('quantity') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="unit">Unit</label>
                    <input type="text" id="unit" wire:model.defer="unit">
                    @error('unit') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="comments">Comments</label>
                    <textarea id="comments" wire:model.defer="comments"></textarea>
                    @error('comments') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <button type="submit" class="btn-primary">Donate</button>
                    <button type="button" wire:click="donateAnotherItem">Donate Another Item</button>
                </div>
            </form>
        </div>

        </x-slot:content>

        
    </x-mary-main>
</div>
