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
    padding: 20px;
    margin-top: 30px;
}

.welcome-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

    /* Set the background image */
    background-image: url("/public/children-img.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    /* z-index: 1; Set z-index to 1 to place it above the overlay */
}

/* #welcome-background-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(245, 245, 220, 0.5); /* Set the background color with 50% transparency 
    z-index: 2; /* Set z-index to 2 to place it above the background image but behind the content 
} */

.welcome-section .text {
    flex: 1;
    margin-right: 20px;
    position: relative; /* Add position relative to the text content */
    /* z-index: 3;  Set z-index to 3 to place it above the overlay and background image */
}

.welcome-section h2 {
    font-size: 72px;
    margin-bottom: 10px;
    color: #633f21;
    font-family: Chalkduster;
}

.welcome-section p {
    font-size: 24px;
    color: #96663e;
    margin-bottom: 10px;
    font-family: "Telugu MN";
}

.welcome-section .image {
    flex: 1;
    text-align: center;
    position: relative; /* Add position relative to the image content */
    z-index: 3; /* Set z-index to 3 to place it above the overlay and background image */
}

.welcome-section .image img {
    width: 100%;
    max-width: 500px;
    height: auto;
    max-height: 500px;
    border-radius: 5px;
}
.get-started-btn {
    display: inline-block;
    background-color: #633f21;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 18px;
    margin-top: 20px;
    font-family: "Telugu MN";
}

.about-section {
    background-color: rgba(245, 245, 220, 0.5);
    padding: 40px;
    border-radius: 5px;
    margin-top: 40px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex; /* Use flexbox */
    align-items: center; /* Center the content vertically */
    flex-wrap: wrap; /* Allow content to wrap */
}

.about-section h3 {
    font-size: 60px;
    color: #633f21;
    margin-bottom: 20px;
    width: 100%; /* Make the heading occupy the full width */
    text-align: center;
    font-family: Chalkduster;
    margin-top: 0;
}

.about-section p {
    font-size: 24px;
    color: #333333;
    flex: 1; /* Let the text occupy remaining space */
    margin-left: 50px; /* Add some space between text and image */
    margin-right: 25px;
    font-family: "Telugu MN";
    text-align: justify;
}

.about-section img {
    max-width: 50%;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 20px; /* Add space between image and text */
    margin-left: 20px; /* Add space between image and text */
}

.numbers-section {
    display: flex;
    justify-content: space-around;
    padding: 40px 0;
    background-color: rgba(245, 245, 220, 0.5);
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.number-card {
    text-align: center;
    width: 100%;
}

.number-card h3 {
    margin-top: 10px;
    font-size: 60px;
    margin-bottom: 10px;
    color: #633f21;
    font-family: Chalkduster;
}

.number-card p {
    font-size: 18px;
    color: #96663e;
    font-family: "Telugu MN";
}

.testimonials-section {
    padding: 40px;
    text-align: center;
    color: #fff;
    overflow: hidden; /* Hide the overflowing cards to prevent them from displaying outside the container */
}

.testimonials-section h2 {
    font-family: Chalkduster;
    font-size: 60px;
    margin-top: 0;
    color: #633f21;
}

.testimonials-section p {
    font-family: "Telugu MN";
    font-size: 18px;
    color: #96663e;
}

.testimonials-container {
    display: flex;
    overflow: hidden;
   /* animation: slideCards 60s linear infinite;  Add CSS animation to slide the cards */
}

.testimonial-card {
    display: inline-block;
    width: calc(33.33% - 20px);
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    margin-left: 20px;
}

.testimonial-card img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 10px;
    display: block;
}

.testimonial-author {
    font-size: 14px;
    font-weight: bold;
    color: #808080;
}

@keyframes slideCards {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}

.contact-and-location {
    display: flex;
    justify-content: space-between;
}

.contact-form {
    flex: 1;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.contact-form h2 {
    font-family: Chalkduster;
    font-size: 60px;
    margin-top: 0;
    color: #633f21;
}

.contact-form label {
    display: block;
    margin-bottom: 10px;
    font-family: "Telugu MN";
    font-size: 18px;
}

.contact-form input,
.contact-form textarea {
    width: 97.5%;
    padding: 10px; /* Add padding to the input and textarea */
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    color: #96663e;
}

.contact-form button {
    background-color: #633f21;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-family: "Telugu MN";
    font-size: 18px;
}

.footer {
    width: 100%;
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

/* Add media query for responsive layout */
@media (max-width: 768px) {
    .about-section {
        padding: 20px;
        flex-direction: column; /* Stack the content on small screens */
    }
    .about-section img {
        max-width: 100%;
        margin-top: 20px;
        margin-left: 0; /* Reset margin for the image on small screens */
    }
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

    </style>

    </head>

    <body>

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
            <x-mary-button label="Donate" link="#Services" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="Reviews" link="#Reviews" class="btn-ghost btn-sm" responsive />
            <x-mary-button label="Contact Us" link="#Contact-Us" class="btn-ghost btn-sm" responsive />

            @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-sm"> Dashboard </a>

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
                <p>A Donations Management Tool <br> Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                <br> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <a href="{{ route('register') }}" class="get-started-btn">Get Started</a>
            </div>

            <div class="image">
                <img src="{{ asset('img/children-img.jpg') }}" alt="" >
            </div>

            <div id="welcome-background-overlay"></div>
        </div>

        <!-- About Us section -->
    <section class="about-section" id="About-Us">
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

    <!-- Number section -->
    <div class="numbers-section" id="numbers">
        <div class="number-card">
            <h3><span> 0 </span>+</h3>
            <p>Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="number-card">
            <h3><span> 0 </span>+</h3>
            <p>Lorem ipsum dolor sit amet consectetur</p>
        </div>
    </div>

    <!-- Testimonials-->
    <section class="testimonials-section" id="Reviews">
        <h2>Testimonials</h2>
        <div class="testimonials-container"> <!-- Wrapper for the testimonial cards -->
            <div class="testimonial-card">
                <!-- Testimonial content for the first card -->
                    <img src="{{ asset('img/plain-prof-pic.png') }}" alt="Profile 1" class="profile-picture">
                    <div class="testimonial-text">
                        <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem non, 
                            omnis repudiandae hic nobis aliquid. Ut, obcaecati deleniti.
                            lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem non,"</p>
                        <p class="testimonial-author">- John Doe</p>
                    </div>
            </div>

            <div class="testimonial-card">
                <!-- Testimonial content for the second card -->
                <img src="{{ asset('img/prof-pic-specs.png') }}" alt="Profile 2" class="profile-picture">
                <div class="testimonial-text">
                    <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ea 
                        rerum doloremque ipsam tenetur excepturi quas iusto error fugit magni architecto labore molestias, 
                        voluptatum sit. Quod eum nemo corrupti excepturi."</p>
                    <p class="testimonial-author">- Jack Doe</p>
                </div>
            </div>

            <div class="testimonial-card">
                <!-- Testimonial content for the third card -->
                <img src="{{ asset('img/anime-prof-pic.png') }}" alt="Profile 3" class="profile-picture">
                <div class="testimonial-text">
                    <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ea 
                        rerum doloremque ipsam tenetur excepturi quas iusto error fugit magni architecto labore molestias, 
                        voluptatum sit. Quod eum nemo corrupti excepturi."</p>
                    <p class="testimonial-author">- Mike Johnson</p>
                </div>
            </div>

            <div class="testimonial-card">
                <img src="images/profile4.jpeg" alt="Profile 4" class="profile-picture">
                <div class="testimonial-text">
                    <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ea 
                        rerum doloremque ipsam tenetur excepturi quas iusto error fugit magni architecto labore molestias, 
                        voluptatum sit. Quod eum nemo corrupti excepturi."</p>
                    <p class="testimonial-author">- Sarah Wilson</p>
                </div>
            </div>

            <div class="testimonial-card">
                <img src="images/profile5.jpeg" alt="Profile 5" class="profile-picture">
                <div class="testimonial-text">
                    <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur ea 
                        rerum doloremque ipsam tenetur excepturi quas iusto error fugit magni architecto labore molestias, 
                        voluptatum sit. Quod eum nemo corrupti excepturi."</p>
                    <p class="testimonial-author">- Alex Johnson</p>
                </div>
            </div>
        </div>
    </section>

        <!-- Contact Us Form -->
        <section class="contact-map-section" id="Contact-Us">
            <div class="contact-and-location">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form action="#" method="post">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
    
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
    
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="4" required></textarea>
    
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-logo">
                <img src="images/_Pngtree_medical_health_logo_4135858-removebg-preview.png" alt="Logo">
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#index.php">Home</a></li>
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
</main>
</body>
</html>

            {{-- <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
         --}}

