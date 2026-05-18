<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nom -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Nom complet</label>
            <input id="name" class="block mt-1 w-full p-2 text-gray-800 focus:ring-pink-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-200" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Adresse Email</label>
            <input id="email" class="block mt-1 w-full p-2 text-gray-800 focus:ring-pink-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
        </div>

        <!-- Mot de passe -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Mot de passe</label>
            <input id="password" class="block mt-1 w-full p-2 text-gray-800 focus:ring-pink-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-200" />
        </div>

        <!-- Confirmation Mot de passe -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="block mt-1 w-full p-2 text-gray-800 focus:ring-pink-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-200" />
        </div>

<div class="flex flex-col gap-4 mt-6">
            <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg">
                S'inscrire
            </button>

            <a class="text-center text-sm text-white hover:underline" href="{{ route('login') }}">
                Déjà inscrit ? Connectez-vous
            </a>
        </div>
    </form>
</x-guest-layout>