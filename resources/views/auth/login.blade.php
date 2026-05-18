<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Email</label>
            <input id="email" class="block mt-1 w-full p-2 text-gray-800 focus:ring-pink-500" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block font-medium text-sm text-white mb-1">Mot de passe</label>
            <input id="password" class="block mt-1 w-full p-2 text-gray-800" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-200" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-600 shadow-sm" name="remember">
                <span class="ms-2 text-sm text-white">Se souvenir de moi</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 mt-6">
            <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg">
                Se connecter
            </button>

            <div class="flex justify-between items-center text-xs text-white">
                @if (Route::has('password.request'))
                    <a class="hover:underline" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
                
                <a class="font-bold hover:underline" href="{{ route('register') }}">
                    Pas de compte ? S'inscrire
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>