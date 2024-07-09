<div>
    <button wire:click="showSignUpModal({{ $activity->id }})" class="bg-blue-500 text-white px-4 py-2 rounded">Sign Up</button>

    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-8 rounded shadow-md max-w-lg mx-auto">
                <h2 class="text-xl font-bold mb-4">Sign Up as a Volunteer</h2>
                <form wire:submit.prevent="submitSignUp">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input wire:model.defer="name" type="text" id="name" name="name" class="form-input mt-1 block w-full rounded-md shadow-sm">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input wire:model.defer="email" type="email" id="email" name="email" class="form-input mt-1 block w-full rounded-md shadow-sm">
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <!-- Additional fields can be added as needed -->

                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
