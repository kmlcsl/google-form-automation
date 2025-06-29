@extends('layouts.app')

@section('title', 'Sistem Otomatisasi Google Form')

@section('content')
    <div class="min-h-screen bg-slate-950 text-white overflow-hidden relative">
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

        <!-- Floating Grid Pattern -->
        <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/95 to-slate-950/90"></div>

        <!-- Hero Section -->
        <div class="relative z-10">
            <!-- Navigation -->
            <nav class="px-6 lg:px-8 py-6">
                <div class="mx-auto max-w-7xl flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                            </svg>
                        </div>
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-600 bg-clip-text text-transparent">FormAI</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#features" class="text-gray-300 hover:text-cyan-400 transition-colors">Fitur</a>
                        <a href="#how-it-works" class="text-gray-300 hover:text-cyan-400 transition-colors">Cara Kerja</a>
                        <a href="#pricing" class="text-gray-300 hover:text-cyan-400 transition-colors">Harga</a>
                        <a href="{{ route('admin.dashboard') }}"
                            class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white px-6 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-cyan-500/25">
                            Masuk Panel Admin
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="px-6 lg:px-8 py-20">
                <div class="mx-auto max-w-4xl text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center space-x-2 bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-full px-4 py-2 mb-8">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-sm text-gray-300">Otomatisasi Form Generasi Terbaru</span>
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                        <span class="bg-gradient-to-r from-white via-cyan-200 to-blue-400 bg-clip-text text-transparent">
                            Otomatisasi Google Forms
                        </span>
                        <br>
                        <span
                            class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent">
                            Skala Besar
                        </span>
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
                        Terapkan pengiriman formulir bertenaga AI dengan kontrol presisi.
                        <span class="text-cyan-400 font-semibold">1000+ respons</span>
                        diotomatisasi dengan algoritma anti-deteksi yang cerdas.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">
                        <a href="{{ route('admin.dashboard') }}"
                            class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-gradient-to-r from-cyan-500 to-blue-600 rounded-2xl hover:from-cyan-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-cyan-500/30">
                            <span
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-cyan-400 to-blue-500 rounded-2xl blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"></span>
                            <span class="relative flex items-center space-x-2">
                                <span>Mulai Otomatisasi</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </a>
                        <button
                            class="inline-flex items-center space-x-2 px-8 py-4 text-lg font-medium text-gray-300 border border-slate-600 rounded-2xl hover:border-cyan-500 hover:text-cyan-400 transition-all duration-300 backdrop-blur-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M19 10a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Lihat Demo</span>
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-20">
                        <div class="text-center">
                            <div
                                class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent mb-2">
                                1M+</div>
                            <div class="text-gray-400 text-sm">Form Terkirim</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-400 to-cyan-500 bg-clip-text text-transparent mb-2">
                                99.9%</div>
                            <div class="text-gray-400 text-sm">Tingkat Keberhasilan</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-500 bg-clip-text text-transparent mb-2">
                                24/7</div>
                            <div class="text-gray-400 text-sm">Otomatisasi</div>
                        </div>
                        <div class="text-center">
                            <div
                                class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent mb-2">
                                5menit</div>
                            <div class="text-gray-400 text-sm">Waktu Setup</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div id="features" class="px-6 lg:px-8 py-20">
                <div class="mx-auto max-w-7xl">
                    <!-- Section Header -->
                    <div class="text-center mb-20">
                        <h2 class="text-4xl md:text-5xl font-bold mb-6">
                            <span class="bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                                Didukung oleh
                            </span>
                            <br>
                            <span class="bg-gradient-to-r from-cyan-400 to-purple-600 bg-clip-text text-transparent">
                                Teknologi AI Canggih
                            </span>
                        </h2>
                        <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                            Fitur otomatisasi revolusioner yang dirancang untuk web modern
                        </p>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-cyan-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Implementasi Super Cepat</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Deploy ribuan pengiriman form dalam hitungan menit dengan sistem queue yang
                                    dioptimalkan dan pembatasan rate yang cerdas.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-pink-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-purple-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Generasi Respons Cerdas</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Pembangkitan respons bertenaga AI dengan pola yang dapat disesuaikan, nilai acak, dan
                                    variasi data yang cerdas.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-emerald-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-green-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Perlindungan Anti-Deteksi</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Teknologi siluman canggih dengan pola seperti manusia, rotasi proxy, dan peniruan
                                    perilaku.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-orange-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-yellow-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Analitik Real-time</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Pantau performa dengan dashboard live, tingkat keberhasilan, dan log eksekusi yang
                                    detail.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 5 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-indigo-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-blue-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Perpustakaan Template</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Template siap pakai untuk kasus penggunaan umum dengan kustomisasi drag-and-drop.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 6 -->
                        <div class="group relative">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-red-500/10 to-pink-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                            </div>
                            <div
                                class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8 hover:border-red-500/50 transition-all duration-300">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-red-400 to-pink-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-white mb-4">Integrasi API</h3>
                                <p class="text-gray-400 leading-relaxed">
                                    Integrasi mulus dengan workflow yang ada melalui REST API dan webhook.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="px-6 lg:px-8 py-20">
                <div class="mx-auto max-w-4xl text-center">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-purple-600/20 rounded-3xl blur-3xl">
                        </div>
                        <div class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-3xl p-12">
                            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                                <span class="bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">
                                    Siap Mengembangkan
                                </span>
                                <br>
                                <span class="bg-gradient-to-r from-cyan-400 to-purple-600 bg-clip-text text-transparent">
                                    Otomatisasi Form Anda?
                                </span>
                            </h2>
                            <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto">
                                Bergabunglah dengan ribuan pengguna yang telah mengotomatisasi jutaan pengiriman form
                                dengan platform kami.
                            </p>
                            <a href="{{ route('admin.dashboard') }}"
                                class="group relative inline-flex items-center justify-center px-12 py-5 text-xl font-medium text-white bg-gradient-to-r from-cyan-500 to-purple-600 rounded-2xl hover:from-cyan-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-cyan-500/30">
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-cyan-400 to-purple-500 rounded-2xl blur opacity-30 group-hover:opacity-50 transition-opacity duration-300"></span>
                                <span class="relative flex items-center space-x-3">
                                    <span>Buka Panel Admin</span>
                                    <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .bg-grid-white\/\[0\.02\] {
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        }
    </style>
@endsection
