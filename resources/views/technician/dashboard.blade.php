<x-app-layout>
    <div class="max-w-6xl mx-auto space-y-6">
        
        <!-- 1. TICKETS LIBRES (À PRENDRE) -->
        <div class="glass p-6">
            <h3 class="text-xl font-bold mb-4">📢 Nouveaux incidents (Libres)</h3>
            <div class="space-y-3">
                @forelse($incidentsLibres as $incident)
                    <div class="flex justify-between items-center bg-white/10 p-4 rounded-xl border border-white/20">
                        <div>
                            <p class="font-bold">{{ $incident->title }}</p>
                            <p class="text-xs text-pink-200">{{ $incident->category->label }} | Par: {{ $incident->user->name }}</p>
                        </div>
                        <form action="{{ route('technician.take', $incident) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-bold hover:bg-pink-100 shadow-md">
                                Prise en charge
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-sm italic opacity-50 text-center">Aucun nouveau ticket.</p>
                @endforelse
            </div>
        </div>

        <!-- 2. MES TÂCHES EN COURS -->
        <div class="glass p-6">
            <h3 class="text-xl font-bold mb-4">🛠️ Mes interventions en cours</h3>
            <div class="space-y-3">
                @forelse($mesTaches as $incident)
                    <div class="flex justify-between items-center bg-pink-900/20 p-4 rounded-xl border border-pink-400/30">
                        <div>
                            <p class="font-bold">{{ $incident->title }}</p>
                            <p class="text-xs opacity-70">Priorité: {{ $incident->priority }} | Équipement: {{ $incident->equipment->name ?? 'N/A' }}</p>
                        </div>
                        <form action="{{ route('technician.resolve', $incident) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-pink-700 shadow-md">
                                Marquer comme Résolu
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-sm italic opacity-50 text-center">Vous n'avez aucun ticket en cours.</p>
                @endforelse
            </div>
        </div>

        <!-- 3. HISTORIQUE (TRAÇABILITÉ) -->
        <div class="opacity-70">
            <h3 class="text-lg font-bold mb-2">✅ Récemment résolus</h3>
            <div class="glass p-4 text-sm">
                @foreach($archives->take(5) as $archive)
                    <div class="flex justify-between py-1 border-b border-white/10">
                        <span>{{ $archive->title }}</span>
                        <span class="text-green-300">Résolu le {{ $archive->updated_at->format('d/m H:i') }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>