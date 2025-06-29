@extends('layouts.app')

@section('title', 'Register - Google Form Automation')

@section('content')
    <div class="min-h-screen bg-slate-950 text-white overflow-hidden relative flex items-center justify-center">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-20">
            <div
                class="absolute top-0 -left-4 w-72 h-72 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-0 -right-4 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/95 to-slate-950/90"></div>

        <!-- Register Container -->
        <div class="relative z-10 w-full max-w-md mx-auto px-6">
            <!-- Logo & Title -->
            <div class="text-center mb-8">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h1
                    class="text-3xl font-bold bg-gradient-to-r from-purple-400 to-pink-600 bg-clip-text text-transparent mb-2">
                    Bergabung dengan FormAI
                </h1>
                <p class="text-gray-400">Buat akun untuk mengakses otomatisasi Google Forms</p>
            </div>

            <!-- Register Form -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-pink-600/10 rounded-2xl blur-xl"></div>
                <div class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8">
                    <form method="POST" action="{{ route('register.post') }}" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300">
                            @error('name')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300">
                            @error('email')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <input type="password" name="password" id="password" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300">
                            @error('password')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-300 mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300">
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start">
                            <input type="checkbox" required
                                class="w-4 h-4 mt-1 bg-slate-700 border-slate-600 rounded text-purple-500 focus:ring-purple-500 focus:ring-offset-0">
                            <label class="ml-2 text-sm text-gray-300">
                                Saya setuju dengan <a href="#" class="text-purple-400 hover:text-purple-300">Syarat &
                                    Ketentuan</a>
                                dan <a href="#" class="text-purple-400 hover:text-purple-300">Kebijakan Privasi</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-medium py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-purple-500/25">
                            <span class="flex items-center justify-center space-x-2">
                                <span>Buat Akun</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </span>
                        </button>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-400">
                            Sudah punya akun?
                            <a href="{{ route('login') }}"
                                class="text-purple-400 hover:text-purple-300 font-medium transition-colors">
                                Masuk sekarang
                            </a>
                        </p>
                    </div>

                    <!-- Back to Home -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-400 text-sm transition-colors">
                            ← Kembali ke beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
