<x-app-layout>
    <div class="max-w-2xl mx-auto glass p-8">
        <h3 class="text-2xl font-bold mb-6">Signaler un nouvel incident</h3>

        <form action="{{ route('incidents.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Titre de l'incident</label>
                <input type="text" name="title" class="w-full p-2 rounded-lg bg-white/30 border-none text-gray-900" required>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1">Catégorie</label>
                    <select name="category_id" class="w-full p-2 rounded-lg bg-white/30 border-none text-gray-800">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Priorité</label>
                    <select name="priority" class="w-full p-2 rounded-lg bg-white/30 border-none text-gray-800">
                        <option value="basse">Basse</option>
                        <option value="moyenne" selected>Moyenne</option>
                        <option value="haute">Haute</option>
                    </select>
                </div>
            </div>

            <!-- Ajoutez ce bloc dans votre formulaire de création existant, avant la description -->
<div class="mb-4">
    <label class="block mb-1">Équipement concerné (Optionnel)</label>
    <select name="equipment_id" class="w-full p-2 rounded-lg bg-white/30 border-none text-gray-800">
        <option value="">-- Sélectionner un équipement --</option>
        @foreach($equipments as $equipment)
            <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
        @endforeach
    </select>
</div>

            <div class="mb-6">
                <label class="block mb-1">Description détaillée</label>
                <textarea name="description" rows="4" class="w-full p-2 rounded-lg bg-white/30 border-none text-gray-900" required></textarea>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('dashboard') }}" class="text-white opacity-80 py-2">Annuler</a>
                <button type="submit" class="bg-pink-600 px-6 py-2 rounded-xl font-bold hover:bg-pink-700">Envoyer</button>
            </div>
        </form>
    </div>
</x-app-layout>