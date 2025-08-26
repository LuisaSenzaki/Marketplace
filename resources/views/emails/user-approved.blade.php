 <!DOCTYPE html>
<html lang="pt-br">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/header-style.css', 'resources/css/desktop.css'])

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Xlab</title>
</head>
<body style="margin-top: 20px;">

<div class="email-container">
    <div class="email-header">
        <img src="{{ asset('images/Group.png') }}" alt="Logo" class="logo">
        <h1>Marketplace X.lab</h1>
    </div>

    <h2>Olá, {{ $user->name }}!</h2>
    <p>Sua conta na nossa plataforma foi aprovada.</p>

    <p>Agora você já pode fazer login para acessar sua conta e começar a explorar o universo da X.lab.</p>

    <a href="{{ url('/login') }}">
        Acessar Conta
    </a>

    <p style="font-family: 'gilroy-bold';">Obrigado por se juntar a nós!</p>
</div>

</body>
</html>