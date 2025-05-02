<x-guest-layout>
    <div class="min-h-screen bg-gray-200">
        <!-- Header with role switch -->
        <div class="flex justify-end items-center bg-white px-6 py-4 shadow">
            <div class="relative">
                <button id="role-toggle" class="flex items-center text-sm font-semibold text-gray-700 hover:text-blue-600 transition">
                    <span id="current-role">Admin</span>
                    <i class="fas fa-user ml-2"></i>
                </button>
                <div id="role-dropdown" class="hidden absolute right-0 mt-2 w-36 bg-white border rounded shadow-lg z-10">
                    <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-sm" data-role="admin">Admin</button>
                    <button class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-sm" data-role="super_admin">Super Admin</button>
                </div>
            </div>
        </div>

        <!-- Login Box -->
        <div class="flex items-center justify-center mt-10">
            <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm">
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('img/logo.png') }}" alt="STMIK Antar Bangsa" class="h-12">
                </div>
                <h2 class="text-center text-2xl font-bold mb-6">Sign in</h2>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Hidden input for role -->
                    <input type="hidden" name="role" id="role-input" value="admin" />

                    <div class="mb-4">
                        <input id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               type="email" name="email" placeholder="Username" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <input id="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               type="password" name="password" placeholder="Password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="mr-2 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
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
    </div>

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        const toggleButton = document.getElementById('role-toggle');
        const dropdown = document.getElementById('role-dropdown');
        const roleInput = document.getElementById('role-input');
        const currentRoleDisplay = document.getElementById('current-role');

        toggleButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });

        document.querySelectorAll('#role-dropdown button').forEach(btn => {
            btn.addEventListener('click', () => {
                const role = btn.getAttribute('data-role');
                roleInput.value = role;
                currentRoleDisplay.textContent = btn.textContent;
                dropdown.classList.add('hidden');
            });
        });

        // Optional: close dropdown on outside click
        window.addEventListener('click', function (e) {
            if (!toggleButton.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</x-guest-layout>
