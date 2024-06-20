<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
/* Main Content Styles */
.main-content {
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Section Styles */
section {
    width: 80%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 40px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Home Section Specific Styles */
.feature-section .text {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

/* About Us and Contact Us Section */
.about-us-section, .contact-us-section {
    text-align: left;
}

/* Footer Styles */
footer {
    width: 100%;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: auto; /* Pushes the footer to the bottom of the page */
}

/* Utility Classes */
.text-center {
    text-align: center;
}


/* Responsive Design */
@media (width: full-width) {
    .feature-section .text, section {
        padding: 20px;
    }

    section {
        width: 90%;
    }
}
/* footer {
    background-color: #333;
    color: white;
    padding: 20px 0;
} */

    </style>


<body>

    </head>

    <!-- ABOVE THE FOLD -->

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
            <x-mary-button label="Home" link="#Home" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="About Us" link="#About-Us" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="Donate" link="#Donate" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="Contact Us" link="#Contact-Us" class="btn-ghost btn-sm" responsive />

            @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-neutral btn-sm"> Dashboard </a>

             @else
                <a href="{{ route('login') }}" class="btn btn-sm"> Log in </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-sm"> Register
                </a>

            @endif

            @endauth
                        
            @endif
            
        </x-slot:actions>
    </x-mary-nav>


<main>
    <div class="main-content" id="welcome">
        <div class="welcome-section">
            <div class="text">
                <h2>We Are <br> Dynamic Donations</h2>
                <p>A Donations' Management Tool <br> designed to help with Lorem ipsum dolor sit.
                <br> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="{{ route('register') }}" class="get-started-btn">Get Started</a>
            </div>

            <div class="image">
                <img src="{{ asset('img/children-img.jpg') }}" alt="" >
            </div>

            <div id="welcome-background-overlay"></div>
        </div>

        <!-- About Us section -->
    <section class="about-section" id="about">
        <h3 >Heard About Us?</h3>

        <!-- Add an image to the About Us section -->
        <img src="{{ asset('img/children-img.jpg') }}" alt="Children">
        <p>Welcome to <u>Dynamic Donations</u>, <br><br>Your trusted partner in donation management.
            At Dynamic Donations, we believe in empowering childrens' homes with innovative tools
            to streamline the Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ducimus.
            <br><br>Our <u>User-friendly Donations Management Tool</u> allows donors to conveniently access their donations history,
            while the childrens' home administrators can efficiently manage these donations.
            Join us on our journey to revolutionize donation management, one donation at a time.
            Your well-being is our priority, and with Dynamic Donations, you're in safe hands.
        </p>
    </section>

    <!-- Donate Section -->

    <!-- Number section -->
    <div class="numbers-section" id="numbers">
        <div class="number-card">
            <h3><span id="patientsCount">0</span>+</h3>
            <p>Patients Benefiting From Tabib Health</p>
        </div>
        <div class="number-card">
            <h3><span id="countriesCount">0</span>+</h3>
            <p>Countries Served</p>
        </div>
    </div>

    <!-- Testimonials-->
    <section class="testimonials-section" id="testimonials">
        <h2>Testimonials</h2>
        <div class="testimonials-container"> <!-- Add a wrapper for the testimonial cards -->
            <div class="testimonial-card">
                <!-- Testimonial content for the first card -->
                    <img src="images/profile1.jpeg" alt="Profile 1" class="profile-picture">
                    <div class="testimonial-text">
                        <p>"Tabib Health has been a lifesaver for me! Managing my medications and prescriptions has never been easier.
                            The app's user-friendly interface and secure features give me peace of mind."</p>
                        <p class="testimonial-author">- John Doe</p>
                    </div>
            </div>

            <div class="testimonial-card">
                <!-- Testimonial content for the second card -->
                <img src="images/profile2.png" alt="Profile 2" class="profile-picture">
                <div class="testimonial-text">
                    <p>"As a doctor, I highly recommend Tabib Health to all my patients.
                        It streamlines the prescription process and helps me stay organized with my patients' medical records.
                        A fantastic tool!"</p>
                    <p class="testimonial-author">- Jack Doe</p>
                </div>
            </div>

            <div class="testimonial-card">
                <!-- Testimonial content for the third card -->
                <img src="images/profile3.jpeg" alt="Profile 3" class="profile-picture">
                <div class="testimonial-text">
                    <p>"I've been using Tabib Health for a while now, and it has made a significant difference in my pharmacy workflow.
                        The drug dispensing tool saves time and reduces errors. Kudos to the team behind this brilliant app!"</p>
                    <p class="testimonial-author">- Mike Johnson</p>
                </div>
            </div>

            <div class="testimonial-card">
                <img src="images/profile4.jpeg" alt="Profile 4" class="profile-picture">
                <div class="testimonial-text">
                    <p>"I love how Tabib Health allows me to access my medical records and prescriptions on the go.
                        It's convenient and secure, giving me full control over my health information."</p>
                    <p class="testimonial-author">- Sarah Wilson</p>
                </div>
            </div>

            <div class="testimonial-card">
                <img src="images/profile5.jpeg" alt="Profile 5" class="profile-picture">
                <div class="testimonial-text">
                    <p>"Tabib Health has transformed the way I manage my health.
                        From scheduling doctor appointments to getting prescription reminders, it keeps everything in one place.
                        Highly recommended!"</p>
                    <p class="testimonial-author">- Alex Johnson</p>
                </div>
            </div>

            <!-- Add more testimonial cards here -->
        </div>
    </section>
    <main>
        <div class="main-content" id="main-feature">
            <!-- Home Section with Background Image -->
            <div class="feature-section" style="background-image: url('{{ asset('img/children-img.jpg') }}'); background-size: cover; background-position: center; width: 100%;">
                <div class="text" style="padding: 100px 0; color: white; text-shadow: 2px 2px 4px #000;">
                    <h2>Welcome to Dynamic Donations</h2>
                    <p>Lorem ipsum dolor sit amet. <br> Lorem ipsum dolor sit amet consectetur.
                    <br> Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    <a href="register.php" class="get-started-btn" style="background-color: #f00; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Join Us</a>
                </div>
            </div>

            <!-- About Us Section -->
            <section class="about-us-section" id="About-Us" style="padding: 50px 0;">
                <h3>About Us</h3>
                <p>We are a non-profit organization dedicated to supporting communities in need. Our mission is to provide essential resources and opportunities to those who are less fortunate.</p>
            </section>

            <!-- Contact Us Section -->
            <section class="contact-us-section" id="Contact-Us" style="padding: 50px 0;">
                <h3>Contact Us</h3>
                <p>Have questions or want to get involved? Contact us through our website or reach out directly via email at contact@dynamicdonations.org.</p>
            </section>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </main>
</body>


</html>

