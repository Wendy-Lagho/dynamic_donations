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
        <x-slot name="content">
            <x-mary-header title="JOIN TEAM" with-anchor separator class="text-primary"/>
    
            <div class="grid gap-6">
                @foreach($activities as $activity)
                    <div class="shadow-md rounded-lg p-6 w-full flex flex-col">
                        <h2 class="text-4xl text-primary font-bold mb-4">{{ $activity->title }}</h2>
                        <div class="mt-auto flex justify-end gap-2">
                            <x-mary-button wire:click="showActivityDetails({{ $activity->id }})" label="View More" class="btn bg-primary text-white" />
                        </div>
                    </div>
                @endforeach
            </div>
    
            <x-mary-modal title="{{ $selectedActivity->title ?? 'Activity Details' }}" wire:model="showModal">
                @if($selectedActivity)
                    <div>
                        <p class="text-gray">{!! nl2br(e($selectedActivity->description)) !!}</p>
                        <p><strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($selectedActivity->date_time)->format('F d, Y h:i A') }}</p>
                        <p><strong>Location:</strong> {{ $selectedActivity->location }}</p>
                    </div>
                @endif
    
                <x-slot:actions>
                    <x-mary-button wire:click="closeModal" label="Close" class="btn btn-primary" />
                </x-slot:actions>
            </x-mary-modal>
            <div class="mt-12 bg-gray-100 p-6 rounded-lg">
                <h3 class="text-2xl font-bold text-primary mb-4">Join Our Team</h3>
                <p class="mb-4">Join our team to become a volunteer or participate in our activities with children. Your involvement can make a significant difference in young lives!</p>
                <x-mary-button wire:click="openJoinTeamModal" label="Join Team" class="btn bg-primary text-white" />
            </div>
            
            <x-mary-modal title="Join Our Team" wire:model="showJoinTeamModal">
                <form wire:submit.prevent="submitJoinTeamForm">
                    <x-mary-input wire:model="name" label="Name" required />
                    <x-mary-input wire:model="email" label="Email" type="email" required />
                    <x-mary-input wire:model="phone" label="Phone" required />
                    <x-mary-textarea wire:model="message" label="Message (Optional)" />
            
                    <x-slot:actions>
                        <x-mary-button wire:click="closeJoinTeamModal" label="Cancel" class="btn btn-secondary" />
                        <x-mary-button type="submit" label="Submit" class="btn btn-primary" />
                    </x-slot:actions>
                </form>
            </x-mary-modal>
        </x-slot>
    </x-mary-main>
</div>