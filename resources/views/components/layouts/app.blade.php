<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        
        <body class="font-sans antialiased">
 
            {{-- The navbar with `sticky` and `full-width` --}}
            <x-mary-nav sticky full-width>
         
                <x-slot:brand>
                    {{-- Drawer toggle for "main-drawer" --}}
                    <label for="main-drawer" class="lg:hidden mr-3">
                        <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                    </label>
         
                    {{-- Brand --}}
                    <div>Dynamic Donations</div>
                </x-slot:brand>
         
                {{-- Right side actions --}}
                <x-slot:actions>
                    <x-mary-button label="Home" link="###" class="btn-ghost btn-sm" responsive />
                    <x-mary-button label="About Us" link="###" class="btn-ghost btn-sm" responsive />
                    <x-mary-button label="Donations" link="###" class="btn-ghost btn-sm" responsive />
                    <x-mary-button label="Notifications" link="###" class="btn-ghost btn-sm" responsive />
                </x-slot:actions>
            </x-mary-nav>
         
            {{-- The main content with `full-width` --}}
            <x-mary-main with-nav full-width> 
         
                {{-- The `$slot` goes here --}}
                <x-slot:content>
                    {{ $slot }}
                </x-slot:content>
            </x-mary-main>
         
            {{--  TOAST area --}}
            <x-mary-toast />
        </body>
        