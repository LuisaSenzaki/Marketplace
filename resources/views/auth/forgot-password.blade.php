<x-guest-layout>
    <div style="color: #333; font-family: 'gilroy-light'; font-size: 15px;">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e iremos te enviar um link para redefinir sua senha que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" style="margin-top:20px; color: #D0147A; font-family: 'gilroy-light'; font-size: 15px;"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus style="background: white; border: none; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button style="background: #D0147A; color: white; font-family: 'gilroy-light'; font-size: 12px;">
                {{ __('Resetar Senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
