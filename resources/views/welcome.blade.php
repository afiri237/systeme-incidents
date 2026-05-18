<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Pro - Bienvenue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { 
            background: linear-gradient(135deg, #fce4ec 0%, #f06292 100%); 
            min-height: 100vh; 
            display: flex; align-items: center; justify-content: center;
        }
        .glass { 
            background: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            border-radius: 30px; 
        }
    </style>
</head>
<body class="antialiased text-white">
    <div class="glass p-12 text-center max-w-lg shadow-2xl">
        <h1 class="text-5xl font-bold mb-4">Incident<span class="text-pink-800">Pro</span></h1>
        <p class="text-pink-100 mb-8 text-lg">La solution simple et rapide pour gérer vos incidents techniques.</p>
        
        <div class="flex flex-col gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-white text-pink-600 px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-pink-50">
                        Aller au Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-pink-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:bg-pink-700">
                        Connexion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-white/20 text-white px-8 py-3 rounded-xl font-bold border border-white/30 hover:bg-white/40">
                            Créer un compte
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>