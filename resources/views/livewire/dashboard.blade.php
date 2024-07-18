<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('/img/logo-white.png') }}" type="image/png" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .main-content {
            padding: 10px;
            margin-top: 30px;
        }

        .image {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image img {
            width: 100%;
            height: 100%;
        }

        .help-children {
            background-color: rgba(245, 245, 220, 0.5);
            padding: 20px;
            border-radius: 5px;
            margin-top: 2rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .help-children h2 {
            font-size: 50px;
            color: #633f21;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
            font-family: Chalkduster;
            margin-top: 0;
        }

        .help-children p {
            font-size: 20px;
            color: #96663e;
            margin-bottom: 20px;
            width: 100%;
            text-align: justify;
            font-family: Chalkduster;
            margin-top: 0;
            margin-right: 40px;
            margin-left: 40px;
        }

        .our-work {
            background-color: rgba(245, 245, 220, 0.5);
            padding: 20px;
            border-radius: 5px;
            margin-top: 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            /* Add this */
            flex-wrap: wrap;
            /* Add this to allow wrapping */
            justify-content: space-between;
            /* Add this to spread items */
        }

        .our-work h2 {
            font-size: 50px;
            color: #633f21;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
            font-family: Chalkduster;
            margin-top: 0;
        }

        .our-work-text,
        .our-work-stats {
            width: 48%;
            /* Adjust width to fit within container */
        }

        .our-work-text p {
            font-size: 20px;
            color: #96663e;
            margin-bottom: 20px;
            width: 100%;
            text-align: justify;
            font-family: Chalkduster;
            margin-top: 0;
        }

        .our-work-stats {
            width: 48%;
            /* Adjust width to fit within container */
            display: flex;
            flex-direction: column;
            /* Stack items vertically */
            justify-content: space-between;
            /* Space items evenly */
            /* justify-content: flex-start;  Align items to the start */
        }

        .stat-item {
            display: flex;
            align-items: center;
            margin: 16px;
            /* Adjust margin for spacing */
            color: #96663e;
            font-size: 20px;
            font-family: Chalkduster;
        }

        .stat-item img {
            margin-right: 0.5rem;
            /* Space between image and text */
            width: 50px;
            height: 50px;
        }

        .how-to-help {
            background-color: rgba(245, 245, 220, 0.5);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .how-to-help h2 {
            font-size: 50px;
            color: #633f21;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
            font-family: Chalkduster;
            margin-top: 0;
        }

        .how-to-help>div {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .how-to-help img {
            width: 100%;
            height: auto;
            border-radius: 5px 5px 0 0;
        }

        .help-text1,
        .help-text2,
        .help-text3 {
            width: 30%;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            text-align: justify;
            color: #96663e;
            font-family: Chalkduster;
        }

        .help-text1 img,
        .help-text2 img,
        .help-text3 img {
            border-radius: 5px 5px 0 0;
            margin-bottom: 10px;
        }

        .help-text1 p,
        .help-text2 p,
        .help-text3 p {
            margin: 0;
        }

        .help-text1 p a,
        .help-text2 p a,
        .help-text3 p a {
            color: #633f21;
            font-weight: bold;
            text-decoration: none;
        }

        .help-text1 p a:hover,
        .help-text2 p a:hover,
        .help-text3 p a:hover {
            text-decoration: underline;
        }

        .footer {
            width: 100%;
            margin-top: 20px;
            margin-left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #633f21;
            padding: 20px;
            color: #fff;
            border-radius: 5px;
        }

        .footer-logo img {
            max-height: 200px;
            width: auto;
        }

        .footer-links ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
            flex-direction: column;
        }

        .footer-links li {
            margin-top: 10px;
            margin-right: 20px;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .footer-links a {
            text-decoration: none;
            color: #fff;
            font-family: "American Typewriter";
        }

        .footer-location p {
            font-size: 15px;
            margin-bottom: 5px;
            margin-right: 50px;
            text-align: right;
            font-family: "Telugu MN";
        }

        .footer-location a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>


<body>
    <div>
        <x-mary-nav sticky full-width>

            <x-slot:brand>
                {{-- Drawer toggle for "main-drawer" --}}
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>

                {{-- Brand --}}
                <div class="text-primary">Dynamic Donations</div>
            </x-slot:brand>

            {{-- Right side actions --}}
            <x-slot:actions>
                <x-mary-button label="Dashboard" link="{{ route('dashboard') }}" class="btn-ghost btn-sm text-primary"
                    responsive />
                <x-mary-button label="Need Catalogue" link="{{ route('needs') }}" class="btn-ghost btn-sm text-primary"
                    responsive />
                <x-mary-button label="Donate" link="{{ route('donate-form') }}" class="btn-ghost btn-sm text-primary"
                    responsive />
                <x-mary-button label="Blog" link="{{ route('blog-name') }}" class="btn-ghost btn-sm text-primary"
                    responsive />
                {{-- <x-mary-button label="Contact Us" link="#Contact-Us" class="btn-ghost btn-sm text-primary" responsive /> --}}
            </x-slot:actions>
        </x-mary-nav>

        <x-mary-main full-width>
            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
                {{-- MENU --}}
                <x-mary-menu activate-by-route>

                    {{-- User --}}
                    @if ($user = auth()->user())
                        <x-mary-menu-separator />

                        <x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                            class="-mx-2 !-my-2 rounded">

                        </x-mary-list-item>

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


            {{-- The `$slot` goes here --}}
            <x-slot:content>
                <div class="main-content" id="welcome">
                    <div class="image">
                        <img src="{{ asset('img/children-eating.jpg') }}" alt="">
                    </div>


                    <div class="help-children">
                        <h2>Help Children in Thomas Barnardo</h2>
                        <p>At Dynamic Donations, we're committed to improving the lives of children at Thomas Barnardo.
                            Every child deserves a chance to thrive, and your support makes a real difference.
                            From providing essential resources to creating safe spaces for learning and growth,
                            your contributions help us build a brighter future for these deserving young ones.
                            Join us in our mission to nurture, protect, and empower the children who need it most.</p>
                    </div>


                    <div class="our-work">
                        <h2>Our Work For The Children</h2>
                        <div class="our-work-text">
                            <p>At Dynamic Donations, we focus on providing comprehensive support to children in need.
                                Our programs span across education, healthcare, nutrition, and emotional well-being.</p>
                            <p>We believe in creating lasting change by addressing both immediate needs and long-term
                                development.
                                This includes everything from supplying school materials to offering counseling
                                services.</p>
                            <p>Our dedicated team works tirelessly to ensure that every child receives personalized care
                                and attention.
                                We collaborate with local communities to create sustainable solutions that empower
                                children and families.</p>
                            <p>Through your generous donations, we've been able to expand our reach and impact,
                                touching more lives each year. Your support fuels our ongoing efforts to give every
                                child a fair start in life.</p>
                        </div>

                        <div class="our-work-stats">
                            <div class="stat-item">
                                <img src="{{ asset('img/hands-up.png') }}" alt="">
                                <p>Protected 124,492 children from harm</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/ribbon.png') }}" alt="">
                                <p>Provided education to 98,765 children</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/heart.png') }}" alt="">
                                <p>Offered counseling to 45,678 children</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/cross.png') }}" alt="">
                                <p>Provided healthcare to 78,901 children</p>
                            </div>
                            <div class="stat-item">
                                <img src="{{ asset('img/plate-n-knife.png') }}" alt="">
                                <p>Ensured nutrition for 112,233 children</p>
                            </div>
                        </div>
                    </div>

                    <div class="how-to-help">
                        <h2>How to Help the Children</h2>

                        <div>
                            <div class="help-text1">
                                <img src="{{ asset('img/baby-in-classroom.jpg') }}" alt="">
                                <p class="donate-link"><a href="{{ route('donate-form') }}">Donate</a></p>
                                <p>Your financial support can make a world of difference. Whether it's a one-time gift
                                    or a monthly commitment,
                                    every donation helps us provide essential resources, fund educational programs, and
                                    ensure proper care for the children.</p>
                            </div>

                            <div class="help-text2">
                                <img src="{{ asset('img/ben-koor-cute-baby.jpg') }}" alt="">
                                <p class="needs-link"><a href="{{ route('needs') }}">Browse Needs</a></p>
                                <p>Explore our current needs catalog to see specific items or services required by the
                                    children.
                                    From school supplies to medical equipment, your targeted contributions directly
                                    address pressing needs.</p>
                            </div>

                            <div class="help-text3">
                                <img src="{{ asset('img/children-running.jpg') }}" alt="">
                                <p class="join-link"><a href="{{ route('volunteering') }}">Join Team</a></p>
                                <p>Become a part of our volunteer team and make a hands-on impact. Whether you can offer
                                    your time, skills, or expertise,
                                    there are numerous ways to get involved and directly support our mission to help
                                    children.</p>
                            </div>

                        </div>
                    </div>

                    <!-- Footer -->
                    <footer class="footer">
                        <div class="footer-logo">
                            <img src="{{ asset('img/logo-text-white.png') }}" alt="Logo">
                        </div>
                        <div class="footer-links">
                            <ul>
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('needs') }}">Need Catalogue</a></li>
                                <li><a href="{{ route('donate-form') }}">Donate</a></li>
                                <li><a href="{{ route('blog-name') }}">Blog</a></li>
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
