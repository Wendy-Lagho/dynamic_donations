<div>
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
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
        
        <x-slot:content>
            

        <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-blue-900 px-4 py-3 shadow-md mt-4" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-blue-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 12v-2c0-.553-.585-1-1-1-.416 0-1 .447-1 1v2c0 .553.584 1 1 1 .415 0 1-.447 1-1zm1-6.105V6c0 .553.585 1 1 1 .416 0 1-.447 1-1V5.895c1.165-.413 2-1.51 2-2.895 0-1.657-1.343-3-3-3s-3 1.343-3 3c0 1.385.835 2.482 2 2.895zM10 18c4.418 0 8-3.582 8-8H2c0 4.418 3.582 8 8 8z"/></svg></div>
                <div>
                    <p class="font-bold">Your Donation has been Received!</p>
                    <p class="text-sm">Thank you so much for your generosity. <a href="{{ route('history') }}" class="text-blue-500 underline">Click here to view details.</a></p>
                </div>
            </div>
        </div>
        
        <div class="mt-4 bg-yellow-100 border-t-4 border-yellow-500 rounded-b text-yellow-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20c5.523 0 10-4.477 10-10S15.523 0 10 0 0 4.477 0 10s4.477 10 10 10zm0-2a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm.5-9.5V5h-1v5h1zm0 2v-1h-1v1h1z"/></svg></div>
                <div>
                    <p class="font-bold">Action Needed: Update Your Profile Information</p>
                    <p class="text-sm">It looks like some of your profile information is outdated. Please take a moment to <a href="{{ route('dash-profile') }}" class="text-yellow-500 underline">update your details here.</a></p>
                </div>
            </div>
        </div>
        
            
        </x-slot:content>

    </x-mary-main>
</div>
