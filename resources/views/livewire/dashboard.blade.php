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
                <div class="main-content" id="welcome">
                    <div class="image">
                        <img src="{{ asset('img/') }}" alt="" >
                    </div>


                    <div class="help-children">
                        <h2>Help Children in Thomas Barnardo</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Iusto sunt, numquam qui molestiae soluta explicabo error corrupti adipisci 
                            corporis eius dolore accusantium possimus consequatur exercitationem a doloribus, 
                            illo mollitia quae ipsa modi rem! Necessitatibus tenetur beatae doloribus officia accusamus iste!</p>
                    </div>


                    <div class="our-work">
                        <h2> Our Work For The Children</h2>
                        <div class="our-work-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Rem unde maiores facere illum est nisi odio molestias obcaecati at autem.</p>
                        </div>
                        <div class="our-work-stats">
                            <div class="stat-item">
                                <img src="{{ asset('img/') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                        </div>
                    </div>

                    <div class="how-to-help">
                        <h2>How to Help the Children</h2>
                        <img src="{{ asset('img/') }}" alt="">
                        <div class="help-text1">
                            <p class="donate-link"><a href="">Donate</a></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, provident amet optio voluptate 
                                rerum vitae est aperiam sint itaque quo eveniet nemo perferendis eius cumque.</p>
                        </div>
                            <img src="{{ asset('img/') }}" alt="">
                            <div class="help-text2">
                                <p class="needs-link"><a href="">Browse Needs</a></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, provident amet optio voluptate 
                                    rerum vitae est aperiam sint itaque quo eveniet nemo perferendis eius cumque.</p>
                            </div>
                            <img src="{{ asset('img/') }}" alt="">
                            <div class="help-text3">
                                <p class="join-link"><a href="">Join Team</a></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, provident amet optio voluptate 
                                    rerum vitae est aperiam sint itaque quo eveniet nemo perferendis eius cumque.</p>
                            </div>
                    </div>

                    <!-- Footer -->
                    <footer class="footer">
                        <div class="footer-logo">
                            <img src="{{ asset('img/') }}" alt="Logo">
                        </div>
                        <div class="footer-links">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#About-Us">About Us</a></li>
                                <li><a href="#Donate">Donate</a></li>
                                <li><a href="#Contact-Us">Contact</a></li>
                            </ul>
                        </div>
                        <div class="footer-location">
                            <p>Address: 123 Strathmore University, Nairobi, Kenya</p>
                            <p>Email: <a href="mailto:info@tabibhealth.com">info@dynamicdonations.com</a></p>
                            <p>Phone: <a href="tel:+254712345678">+254 (0) 712 345 678</a></p>
                            <p>Copyright Wendy Lagho, Caleb Chemwa</p>
                            <p>All Rights Reserved.</p>
                        </div>
                    </footer>


                </div>
            </x-slot:content>
        </x-mary-main>
    </div>

</body>
</html>