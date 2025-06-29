@extends('layouts.app')

@section('title', 'Login - Google Form Automation')

@section('content')
    <div class="min-h-screen bg-slate-950 text-white overflow-hidden relative flex items-center justify-center">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-20">
            <div
                class="absolute top-0 -left-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-0 -right-4 w-72 h-72 bg-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/95 to-slate-950/90"></div>

        <!-- Login Container -->
        <div class="relative z-10 w-full max-w-md mx-auto px-6">
            <!-- Logo & Title -->
            <div class="text-center mb-8">
                <div
                    class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                    </svg>
                </div>
                <h1
                    class="text-3xl font-bold bg-gradient-to-r from-cyan-400 to-blue-600 bg-clip-text text-transparent mb-2">
                    Masuk ke FormAI
                </h1>
                <p class="text-gray-400">Akses panel admin untuk otomatisasi Google Forms</p>
            </div>

            <!-- Login Form -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 rounded-2xl blur-xl"></div>
                <div class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8">
                    <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                        @csrf

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300">
                            @error('email')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <input type="password" name="password" id="password" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all duration-300">
                            @error('password')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember"
                                    class="w-4 h-4 bg-slate-700 border-slate-600 rounded text-cyan-500 focus:ring-cyan-500 focus:ring-offset-0">
                                <span class="ml-2 text-sm text-gray-300">Ingat saya</span>
                            </label>
                            <a href="#" class="text-sm text-cyan-400 hover:text-cyan-300 transition-colors">
                                Lupa password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-medium py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-cyan-500/25">
                            <span class="flex items-center justify-center space-x-2">
                                <span>Masuk</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-gray-400">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="text-cyan-400 hover:text-cyan-300 font-medium transition-colors">
                                Daftar sekarang
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
