<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="background:white; border: none; border-radius: 5px;"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="background:white; border: none; border-radius: 5px;"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" style="background:white; border: none; border-radius: 5px;" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" style="background:white; border: none; border-radius: 5px;"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" style="background:white; border: none; border-radius: 5px;" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a style="color: #333; font-family: 'gilroy-light'; font-size: 15px; text-decoration: underline;"  href="{{ route('login') }}">
                {{ __('Já tem uma conta?') }}
            </a>

            <x-primary-button class="ms-4" style="background: #D0147A; color: white; font-family: 'gilroy-light'; font-size: 12px;">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
