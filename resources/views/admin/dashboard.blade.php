<x-app-layout>
    <div class="max-w-6xl mx-auto space-y-8">
        
        <div class="flex justify-between items-center">
            <h3 class="text-2xl font-bold">Administration - Gestion du Personnel</h3>
            @if(session('success'))
                <span class="bg-green-500/50 px-4 py-2 rounded-lg text-sm">{{ session('success') }}</span>
            @endif
        </div>

        <!-- FORMULAIRE D'AJOUT RAPIDE -->
        <div class="glass p-6">
            <h4 class="font-bold mb-4">➕ Ajouter un nouveau membre (Technicien ou autre)</h4>
            <form action="{{ route('admin.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                @csrf
                <input type="text" name="name" placeholder="Nom" class="bg-white/20 border-none rounded-lg p-2 text-white placeholder-pink-100" required>
                <input type="email" name="email" placeholder="Email" class="bg-white/20 border-none rounded-lg p-2 text-white placeholder-pink-100" required>
                <input type="password" name="password" placeholder="Mot de passe" class="bg-white/20 border-none rounded-lg p-2 text-white placeholder-pink-100" required>
                <select name="role" class="bg-white/20 border-none rounded-lg p-2 text-gray-800">
                    <option value="user">Utilisateur</option>
                    <option value="technician" selected>Technicien</option>
                    <option value="admin">Administrateur</option>
                </select>
                <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 rounded-lg shadow-lg">
                    Créer
                </button>
            </form>
        </div>

        <!-- STATISTIQUES -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="glass p-6 text-center">
                <span class="text-4xl font-bold">{{ $users->count() }}</span>
                <p class="text-pink-100">Membres inscrits</p>
            </div>
            <div class="glass p-6 text-center">
                <span class="text-4xl font-bold">{{ $totalIncidents }}</span>
                <p class="text-pink-100">Incidents au total</p>
            </div>
        </div>

        <!-- LISTE DES UTILISATEURS -->
        <div class="glass p-6 overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-white/20 text-pink-100">
                        <th class="pb-3">Nom</th>
                        <th class="pb-3">Email</th>
                        <th class="pb-3">Rôle</th>
                        <th class="pb-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b border-white/10">
                        <td class="py-3">{{ $user->name }}</td>
                        <td class="py-3 text-sm">{{ $user->email }}</td>
                        <td class="py-3">
                            <span class="px-2 py-1 rounded text-xs font-bold bg-white/20 uppercase">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="py-3 text-right">
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.role', $user) }}" method="POST" class="inline-flex gap-2">
                                @csrf
                                <select name="role" class="bg-white/10 text-white text-xs rounded border-none p-1">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }} class="text-black">Utilisateur</option>
                                    <option value="technician" {{ $user->role == 'technician' ? 'selected' : '' }} class="text-black">Technicien</option>
                                </select>
                                <button class="bg-white/20 hover:bg-white/40 px-2 py-1 rounded text-xs font-bold">Changer</button>
                            </form>
                            @else
                                <span class="text-xs italic opacity-50">Vous (Admin)</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>