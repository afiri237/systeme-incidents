<x-app-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Mes Signalements</h3>
            <a href="{{ route('incidents.create') }}" class="bg-pink-600 px-4 py-2 rounded-xl font-bold shadow-lg hover:bg-pink-700">
                + Signaler un incident
            </a>
        </div>

        <div class="glass p-6">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-white/20">
                        <th class="pb-3">Titre</th>
                        <th class="pb-3">Catégorie</th>
                        <th class="pb-3">Statut</th>
                        <th class="pb-3">Priorité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidents as $incident)
                    <tr class="border-b border-white/10">
                        <!-- Dans le foreach du tableau -->
                        <td class="py-3">
                            <a href="{{ route('incidents.show', $incident) }}" class="font-bold hover:text-pink-200 transition">
                                {{ $incident->title }}
                            </a>
                        </td>
                        <td class="py-3 text-sm opacity-80">{{ $incident->category->label }}</td>
                        <td class="py-3">
                            <span class="px-2 py-1 rounded text-xs bg-white/20 uppercase font-bold">
                                {{ str_replace('_', ' ', $incident->status) }}
                            </span>
                        </td>
                        <td class="py-3">{{ ucfirst($incident->priority) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>