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

    <x-mary-menu-item title="Profile" icon="o-eye" link="/dash_profile" />
    <x-mary-menu-item title="Needs" icon="o-list-bullet" link="#" />
    <x-mary-menu-item title="History" icon="o-clock" link="#" />
    <x-mary-menu-item title="Donate" icon="o-gift" link="#" />
    <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
        <x-mary-menu-item title="Log out" icon="o-power" link="/logout" />
        <x-mary-menu-item title="Change Theme" icon="o-moon">
            <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
        </x-mary-menu-item>
    </x-mary-menu-sub>
</x-mary-menu>
</x-slot:sidebar>


  </x-mary-main>
</div>