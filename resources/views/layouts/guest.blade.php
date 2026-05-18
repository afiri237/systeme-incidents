<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Pro - Connexion</title>

    <!-- On utilise le CDN Tailwind pour éviter les erreurs de compilation -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #fce4ec 0%, #f06292 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.1);
        }
        input {
            background: rgba(255, 255, 255, 0.4) !important;
            border: 1px solid rgba(255, 255, 255, 0.5) !important;
            border-radius: 10px !important;
        }
    </style>
</head>
<body class="antialiased">
    <div class="w-full sm:max-w-md px-8 py-10 glass-card">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white drop-shadow-sm">Incident<span class="text-pink-700">Pro</span></h1>
            <p class="text-pink-100 text-sm mt-2">Connectez-vous à votre espace</p>
        </div>

        <!-- C'est ici que le contenu de login.blade.php va s'insérer -->
        {{ $slot }}
    </div>
</body>
</html>