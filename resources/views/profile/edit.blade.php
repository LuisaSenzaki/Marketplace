<x-app-layout style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
    <div style="margin-top: 20px; padding: 30px; background: #ffffffff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">

    <h1 style="color: #D0147A; font-family: gilroy-bold; font-size:32px; text-align:center;">Edite Seu Perfil!</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div style="">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
