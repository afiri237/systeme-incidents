<x-app-layout>
    <div class="max-w-4xl mx-auto glass p-8">
        <div class="flex justify-between items-start mb-8">
            <div>
                <h1 class="text-3xl font-bold">{{ $incident->title }}</h1>
                <p class="text-pink-100">Référence #INC-{{ $incident->id }}</p>
            </div>
            <span class="px-4 py-2 rounded-xl font-bold uppercase bg-pink-800 shadow-lg">
                {{ str_replace('_', ' ', $incident->status) }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="space-y-4">
                <div>
                    <h4 class="text-xs uppercase font-bold text-pink-200">Catégorie</h4>
                    <p class="text-lg">{{ $incident->category->label }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase font-bold text-pink-200">Équipement</h4>
                    <p class="text-lg">{{ $incident->equipment->name ?? 'Non spécifié' }}</p>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <h4 class="text-xs uppercase font-bold text-pink-200">Priorité</h4>
                    <p class="text-lg capitalize">{{ $incident->priority }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase font-bold text-pink-200">Technicien assigné</h4>
                    <p class="text-lg font-bold">{{ $incident->technician->name ?? 'En attente d\'assignation...' }}</p>
                </div>
            </div>
        </div>

        <div class="border-t border-white/20 pt-6">
            <h4 class="text-xs uppercase font-bold text-pink-200 mb-2">Description du problème</h4>
            <div class="bg-white/10 p-4 rounded-xl italic">
                "{{ $incident->description }}"
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="text-white hover:underline flex items-center gap-2">
                ← Retour à mes signalements
            </a>
        </div>
    </div>
</x-app-layout>