<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incident Pro - Dashboard</title>

    <!-- On utilise le CDN Tailwind pour éviter les erreurs Vite -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { 
            background: linear-gradient(135deg, #fce4ec 0%, #f06292 100%); 
            min-height: 100vh; 
            font-family: sans-serif;
        }
        .glass { 
            background: rgba(255, 255, 255, 0.2); 
            backdrop-filter: blur(12px); 
            -webkit-backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 255, 255, 0.3); 
            border-radius: 15px; 
        }
    </style>
</head>
<body class="antialiased text-white">
    <nav class="p-4 glass m-4 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <h2 class="text-2xl font-bold">Incident<span class="text-pink-800">Pro</span></h2>
            
            <!-- Liens de navigation selon le rôle -->
            <div class="flex gap-4 text-sm font-bold">
                <a href="{{ route('dashboard') }}" class="hover:text-pink-900">Mes Signalements</a>
                
                @if(Auth::user()->role == 'technician' || Auth::user()->role == 'admin')
                    <a href="{{ route('technician.dashboard') }}" class="bg-white/20 px-3 py-1 rounded-lg hover:bg-white/40">Espace Technicien</a>
                @endif

                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="bg-pink-800/20 px-3 py-1 rounded-lg hover:bg-pink-800/40">Administration</a>
                @endif
            </div>
        </div>

        <div class="flex gap-4 items-center">
            <span class="font-medium text-pink-900">{{ Auth::user()->name }} ({{ Auth::user()->role }})</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-white/20 px-3 py-1 rounded-lg hover:bg-white/40 text-sm font-bold">Déconnexion</button>
            </form>
        </div>
    </nav>

    <main class="p-4">
        {{ $slot }}
    </main>
</body>
</html>