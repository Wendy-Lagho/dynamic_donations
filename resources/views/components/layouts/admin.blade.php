<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <x-mary-main full-width>
            <x-slot name="sidebar" drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
                <x-mary-menu activate-by-route>
                    {{-- User --}}
                    @if($user = auth()->user())
                        <x-mary-menu-separator />
                        <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded"></x-mary-list-item>
                        <x-mary-menu-separator />
                    @endif
                    <x-mary-menu-item title="View Users" icon="o-eye" link="{{ route('admin.view-users') }}" />
                    <x-mary-menu-item title="View Donations" icon="o-gift" link="{{ route('admin.view-donations') }}" />
                    <x-mary-menu-item title="View Needs" icon="o-list-bullet" link="{{ route('admin.view-needs') }}" />
                    <x-mary-menu-item title="View Blog" icon="o-newspaper" link="{{ route('admin.view-blog') }}" />
                    <x-mary-menu-item title="Notifications" icon="o-bell" link="{{ route('admin.admin-notifications') }}" />
                    <x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-mary-menu-item title="Log out" icon="o-power" link="{{ route('logout') }}" />
                        <x-mary-menu-item title="Change Theme" icon="o-moon">
                            <x-mary-theme-toggle darkTheme="coffee" lightTheme="bumblebee" />
                        </x-mary-menu-item>
                    </x-mary-menu-sub>
                </x-mary-menu>
            </x-slot>
            <x-slot name="content">
                {{ $slot }}
            </x-slot>
        </x-mary-main>
    </div>

    @livewireScripts
</body>
</html>