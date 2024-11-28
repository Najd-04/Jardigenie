<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 pt-20"> <!-- pt-20 pour le décalage de la navbar -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Titre de la page -->
            <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-center">{{ __('Login') }}</h2>

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Adresse e-mail -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input
                            id="email"
                            class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input
                            id="password"
                            class="block mt-1 w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Se souvenir de moi -->
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Mot de passe oublié & bouton de soumission -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
