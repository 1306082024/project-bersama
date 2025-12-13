<x-guest-layout>
            <!-- Logo IPTV -->
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968814.png" class="w-20 mx-auto drop-shadow-md animate-pop" />
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login Admin IPTV</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <x-text-input id="email" class="block mt-1 w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <x-text-input id="password" class="block mt-1 w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between pt-2">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-500 hover:text-indigo-600" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition transform hover:scale-[1.02] active:scale-[0.97]">
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Register Option -->
                <div class="text-center pt-3">
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition">
                        Belum punya akun? <span class="font-semibold">Register</span>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Animations -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes pop {
            0% { transform: scale(0.7); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-fadeIn { animation: fadeIn 0.8s ease forwards; }
        .animate-slideUp { animation: slideUp 0.8s ease forwards; }
        .animate-pop { animation: pop 0.5s ease-out; }
    </style>

    <!-- FontAwesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</x-guest-layout>