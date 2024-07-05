<div>
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            {{-- MENU --}}
            <x-mary-menu activate-by-route>
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

        {{-- CONTENT --}}
        <x-slot:content>
            <div class="max-w-4xl mx-auto py-8">
                <h1 class="text-3xl font-bold mb-4 text-primary">Our Journey: Nurturing Hope and Happiness</h1>
                <img src="{{ asset('img/children-running.jpg') }}" alt="Impact Story" class="rounded-lg shadow-md mb-6">
                <p class="mb-4 text-secondary">
                    Your generous donations empower us to create a nurturing environment where every child can thrive. At our children's home, we aim to provide not just the essentials, but also the love and care that every child deserves.
                </p>
                <p class="mb-4 text-secondary">
                    This month, we are excited to share the story of Joshua, a ten-year-old boy who found a new beginning with us. Joshua came to our home after losing his parents and struggling with feelings of abandonment and fear. Thanks to your contributions, we have been able to offer Joshua a safe and loving environment, along with the support he needs to heal and grow.
                </p>
                <p class="mb-4 text-secondary">
                    "The children's home has become my family," Joshua says with a smile. "Here, I have friends to play with and people who care about me. I feel safe and happy again."
                </p>
                <p class="mb-4 text-secondary">
                    Stories like Joshua's are a testament to the profound impact your donations have. Every contribution, whether big or small, helps us provide food, education, healthcare, and emotional support to children who need it most.
                </p>
                <p class="mb-4 text-secondary">
                    Together, we can continue to transform lives and build a brighter future for the children at our home. Your support is the cornerstone of our mission to nurture hope and happiness in every child's heart.
                </p>
                <a href="/donate-form" class="inline-block bg-primary text-white px-6 py-2 rounded hover:bg-primary-dark transition">Support Our Children</a>
            </div>
            
            
        </x-slot:content>
    </x-mary-main>
</div>
