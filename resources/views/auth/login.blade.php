<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-200">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
            <div class="flex justify-center mb-4">
                <img src="{{ asset('img/logo.png') }}" alt="STMIK Antar Bangsa" class="h-12">
            </div>
            <h2 class="text-center text-2xl font-bold mb-6">Sign in</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <input id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" placeholder="Username" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <input id="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            Forgot?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
