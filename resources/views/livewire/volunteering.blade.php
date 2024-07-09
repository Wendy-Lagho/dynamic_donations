<!-- resources/views/livewire/volunteer-opportunities.blade.php -->

<div>
    <h1 class="text-3xl font-bold mb-4">Volunteer Opportunities</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($activities as $activity)
            <div class="bg-white p-4 rounded shadow-md">
                <h2 class="text-lg font-bold mb-2">{{ $activity->title }}</h2>
                <p class="text-gray-600 mb-2">{{ $activity->date_time }} | {{ $activity->location }}</p>
                <p>{{ $activity->description }}</p>
                <button wire:click="signUp({{ $activity->id }})" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Sign Up</button>
            </div>
        @endforeach
    </div>

    <!-- Modal for sign-up form -->
    @if ($showSignUpModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-8 rounded shadow-md max-w-lg mx-auto">
                <h2 class="text-xl font-bold mb-4">Sign Up for {{ $selectedActivity->title }}</h2>
                <form wire:submit.prevent="submitSignUp">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input wire:model="name" type="text" id="name" name="name" class="form-input mt-1 block w-full rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input wire:model="email" type="email" id="email" name="email" class="form-input mt-1 block w-full rounded-md shadow-sm">
                    </div>
                    <!-- Add more fields as needed (phone number, comments, etc.) -->
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
