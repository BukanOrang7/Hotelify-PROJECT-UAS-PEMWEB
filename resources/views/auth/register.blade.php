@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 px-4">
    <div class="w-full max-w-md">
        <!-- Logo/Header Section -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 mb-4 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun Baru</h1>
            <p class="text-gray-600">Bergabung dengan Hotelify sekarang</p>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder:text-gray-400"
                                   placeholder="Nama lengkap Anda">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder:text-gray-400"
                                   placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required autocomplete="new-password"
                                   class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder:text-gray-400"
                                   placeholder="Minimal 8 karakter">
                            <button type="button" id="togglePassword" aria-label="Toggle password visibility" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <!-- Mata tertutup (default saat password tersembunyi) -->
                                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a8.523 8.523 0 012.223-3.364M3 3l18 18"/>
                                </svg>
                                <!-- Mata terbuka (saat password terlihat) -->
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                                   class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition placeholder:text-gray-400"
                                   placeholder="Ketik ulang password">
                            <button type="button" id="togglePasswordConfirmation" aria-label="Toggle password visibility" 
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <!-- Mata tertutup (default saat password tersembunyi) -->
                                <svg id="eyeClosedConfirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a8.523 8.523 0 012.223-3.364M3 3l18 18"/>
                                </svg>
                                <!-- Mata terbuka (saat password terlihat) -->
                                <svg id="eyeOpenConfirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="flex items-start gap-2">
                        <input type="checkbox" id="terms" name="terms" required
                               class="mt-1 w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="terms" class="text-sm text-gray-600">
                            Saya setuju dengan 
                            <span class="text-green-600 cursor-default">Syarat & Ketentuan</span> 
                            dan 
                            <span class="text-green-600 cursor-default">Kebijakan Privasi</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3.5 rounded-lg font-semibold shadow-md hover:shadow-lg active:scale-[0.99] transition-all duration-200">
                        Daftar Sekarang
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Sudah punya akun?</span>
                        </div>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center gap-2 text-green-600 hover:text-green-800 font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Masuk ke akun yang sudah ada
                    </a>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500">
                    Dengan mendaftar, Anda dapat menikmati semua fitur Hotelify
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle untuk password
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');
    
    if (togglePassword && password) {
        togglePassword.addEventListener('click', function() {
            const isPassword = password.type === 'password';
            
            if (isPassword) {
                // Password akan ditampilkan
                password.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                // Password akan disembunyikan
                password.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        });
    }
    
    // Toggle untuk konfirmasi password
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const eyeOpenConfirmation = document.getElementById('eyeOpenConfirmation');
    const eyeClosedConfirmation = document.getElementById('eyeClosedConfirmation');
    
    if (togglePasswordConfirmation && passwordConfirmation) {
        togglePasswordConfirmation.addEventListener('click', function() {
            const isPassword = passwordConfirmation.type === 'password';
            
            if (isPassword) {
                // Password akan ditampilkan
                passwordConfirmation.type = 'text';
                eyeOpenConfirmation.classList.remove('hidden');
                eyeClosedConfirmation.classList.add('hidden');
            } else {
                // Password akan disembunyikan
                passwordConfirmation.type = 'password';
                eyeOpenConfirmation.classList.add('hidden');
                eyeClosedConfirmation.classList.remove('hidden');
            }
        });
    }
});
</script>
@endsection