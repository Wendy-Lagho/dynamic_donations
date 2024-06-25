<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
    </style>    
</head>


<body>
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
     
                    <x-mary-menu-item title="Profile" icon="o-eye" link="/profile" />
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
     

            {{-- The `$slot` goes here --}}
            <x-slot:content>
                
            <x-mary-form wire:submit.prevent="save">
                <x-mary-header title="Donate" with-anchor separator />
                <x-mary-input label="Item" placeholder="Enter item" wire:model="name" />
                <x-mary-input label="Quantity" placeholder="Enter quantity" wire:model="quantity" />
                <x-mary-input label="Description" placeholder="description" wire:model="location" />
                <x-mary-input label="Date" placeholder="Enter location" wire:model="location" />

                
                <x-slot:actions>
                    <x-mary-button type="submit" label="Save" Route::get('/logout', function () {
                        $guards = array_keys(config('auth.guards'));
                    
                        foreach ($guards as $guard) {
                            {{-- if (auth()->guard($guard)->check()) {
                                auth()->guard($guard)->logout(); --}}
                            }
                        }
                    
                        return redirect('/');
                    {{-- })->foreach ($guards as $guard) {
                        if (auth()->guard($guard)->check()) {
                            auth()->guard($guard)->logout(); --}}
                        }
                    }
                
                    return redirect('/');
                {{-- })->name('logout'); --}}
                
                require __DIR__.'/auth.php'; />
                </x-slot:actions>
            </x-mary-form>
            </x-slot:content>
        </x-mary-main>
    </div>

</body>
</html>