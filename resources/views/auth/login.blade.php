<x-guest-layout style="background: white;">
    <!-- Session Status -->
    <x-auth-session-status style="background: white;" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" >
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;"/>
            <x-text-input id="email" style="background:white; width: 100%; border: none; border-radius: 5px;" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" style="color: black; font-family: 'gilroy-light'; font-size: 15px;"/>

            <x-text-input id="password" style="background:white; width: 100%; border: none; border-radius: 5px;"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" style="accent-color: #D0147A;" name="remember">
                <span style="color: black; font-family: 'gilroy-light'; font-size: 15px;">{{ __('Lembre-se de mim') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4 gap-4">
            @if (Route::has('password.request'))
                <a style="color: red; font-family: 'gilroy-light'; font-size: 15px;" href="{{ route('password.request') }}">
                    {{ __('Esqueci minha senha') }}
                </a>
            @endif

            <x-primary-button style="background: #D0147A; color: white; font-family: 'gilroy-light'; font-size: 15px;">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
