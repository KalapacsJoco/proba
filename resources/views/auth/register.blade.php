<x-layout>
    <form method="POST" action="{{ route('register') }}" class="w-1/3">
        @csrf

        <!-- firstName -->
        <div>
            <x-text-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" placeholder="Vezetéknév:" />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>

        <!-- lastName -->
        <div>
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" placeholder="Keresztnév:" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div >
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username"  placeholder="Add meg az email címed:" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div >

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password"
                placeholder="Add meg a jelszavad:" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div >

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password"
                placeholder="Jelszó újra:" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- phone -->
        <div>
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="Telefonszám:"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- street -->
        <div>
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required autofocus autocomplete="street"  placeholder="Utca:" />
            <x-input-error :messages="$errors->get('street')" class="mt-2" />
        </div>

        <!-- houseNumber -->
        <div>
            <x-text-input id="houseNumber" class="block mt-1 w-full" type="text" name="houseNumber" :value="old('houseNumber')" required autofocus autocomplete="houseNumber"  placeholder="Házszám:" />
            <x-input-error :messages="$errors->get('houseNumber')" class="mt-2" />
        </div>

        <!-- terms and conditions-->
        <div class="mt-4">
            <label for="terms" class="inline-flex items-center">
                <input id="terms" type="checkbox" name="terms" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
                <span class="ml-2 text-sm text-gray-100">Elfogadom a felhasználói feltételeket</span>
            </label>
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-100 hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Már regisztrálva van?
            </a>

            <x-primary-button class="ms-4">
                Regisztrálás
            </x-primary-button>
        </div>
    </form>
</x-layout>