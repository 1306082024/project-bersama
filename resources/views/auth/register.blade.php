<x-guest-layout>
    <!-- <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4 animate-fade">
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8 border border-gray-200 animate-slide-up"> -->

            <!-- Logo -->
            <div class="text-center mb-5 animate-pop">
                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968814.png" class="w-20 mx-auto opacity-90" />
                <h2 class="text-2xl font-semibold text-gray-800 mt-3">Register Super Admin IPTV</h2>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <x-text-input id="name" class="block w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="text" name="name" :value="old('name')" required autofocus placeholder="Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <x-text-input id="email" class="block w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="email" name="email" :value="old('email')" required placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <x-text-input id="role" class="block w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="text" name="role" :value="old('role')" required placeholder="Role" />
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <x-text-input id="password" class="block w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="password" name="password" required placeholder="Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <span class="absolute left-3 top-3 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <x-text-input id="password_confirmation" class="block w-full pl-10 rounded-lg border-gray-300 focus:ring-indigo-400 focus:border-indigo-400" type="password" name="password_confirmation" required placeholder="Confirm Password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between pt-2">
                    <a class="text-sm text-indigo-500 hover:text-indigo-600" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition transform hover:scale-105">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<!-- Animations -->
<style>
    .animate-fade { animation: fade 0.8s ease-out; }
    .animate-slide-up { animation: slideUp 0.8s ease-out; }
    .animate-pop { animation: pop 0.6s ease-out; }

    @keyframes fade {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    @keyframes pop {
        from { transform: scale(0.9); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
</style>