<x-app-layout>
    <div class="max-w-6xl mx-auto space-y-8">
        
        <!-- SECTION 1 : INCIDENTS NON ASSIGNÉS -->
        <div>
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span class="w-3 h-3 bg-yellow-400 rounded-full animate-ping"></span>
                Incidents à prendre en charge
            </h3>
            <div class="glass p-6">
                @if($incidentsLibres->isEmpty())
                    <p class="text-pink-100 italic">Aucun incident en attente.</p>
                @else
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/20">
                            <th class="pb-3">Client</th>
                            <th class="pb-3">Titre</th>
                            <th class="pb-3">Priorité</th>
                            <th class="pb-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incidentsLibres as $incident)
                        <tr class="border-b border-white/10">
                            <td class="py-3 text-sm">{{ $incident->user->name }}</td>
                            <td class="py-3 font-medium">{{ $incident->title }}</td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded text-xs bg-red-500/50">{{ $incident->priority }}</span>
                            </td>
                            <td class="py-3">
                                <form action="{{ route('technician.take', $incident) }}" method="POST">
                                    @csrf
                                    <button class="bg-white text-pink-600 px-3 py-1 rounded-lg text-sm font-bold hover:bg-pink-100">
                                        Prendre
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>

        <!-- SECTION 2 : MES INTERVENTIONS -->
        <div>
            <h3 class="text-xl font-bold mb-4">Mes interventions en cours</h3>
            <div class="glass p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/20">
                            <th class="pb-3">Titre</th>
                            <th class="pb-3">Statut actuel</th>
                            <th class="pb-3">Changer statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mesIncidents as $incident)
                        <tr class="border-b border-white/10">
                            <td class="py-3">{{ $incident->title }}</td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded text-xs bg-pink-800 font-bold uppercase">
                                    {{ str_replace('_', ' ', $incident->status) }}
                                </span>
                            </td>
                            <td class="py-3">
                                <form action="{{ route('technician.status', $incident) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="status" class="bg-white/20 text-white text-sm rounded border-none p-1">
                                        <option value="en_cours" {{ $incident->status == 'en_cours' ? 'selected' : '' }} class="text-gray-800">En cours</option>
                                        <option value="resolu" {{ $incident->status == 'resolu' ? 'selected' : '' }} class="text-gray-800">Résolu</option>
                                    </select>
                                    <button class="bg-pink-600 px-2 py-1 rounded text-xs font-bold hover:bg-pink-700">OK</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>