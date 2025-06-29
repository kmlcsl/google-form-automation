{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Google Form Automation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-white">
    <div class="min-h-full relative">
        <!-- Background Effects -->
        <div class="fixed inset-0 opacity-5">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute top-1/2 right-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>

        <!-- Grid Background -->
        <div class="fixed inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>

        <div class="flex h-full relative z-10">
            <!-- Sidebar -->
            <div class="hidden lg:flex lg:w-72 lg:flex-col">
                <div class="flex flex-col flex-grow bg-slate-900/50 backdrop-blur-xl border-r border-slate-800/50">
                    <!-- Logo Section -->
                    <div class="flex items-center flex-shrink-0 px-6 py-6 border-b border-slate-800/50">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-600 bg-clip-text text-transparent">FormAI</h1>
                                <p class="text-xs text-gray-400">Admin Panel</p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="mt-8 flex-1 flex flex-col px-4">
                        <nav class="flex-1 space-y-2">
                            <a href="{{ route('admin.dashboard') }}"
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-cyan-500/20 to-blue-600/20 text-cyan-400 border border-cyan-500/30' : 'text-gray-300 hover:bg-slate-800/50 hover:text-cyan-400' }}">
                                <svg class="mr-3 h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"/>
                                </svg>
                                <span class="flex-1">Dashboard</span>
                                @if(request()->routeIs('admin.dashboard'))
                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
                                @endif
                            </a>

                            <a href="{{ route('admin.google-forms.index') }}"
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('admin.google-forms.*') ? 'bg-gradient-to-r from-purple-500/20 to-pink-600/20 text-purple-400 border border-purple-500/30' : 'text-gray-300 hover:bg-slate-800/50 hover:text-purple-400' }}">
                                <svg class="mr-3 h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="flex-1">Google Forms</span>
                                @if(request()->routeIs('admin.google-forms.*'))
                                <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                                @endif
                            </a>

                            <a href="{{ route('admin.executions.index') }}"
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('admin.executions.*') ? 'bg-gradient-to-r from-green-500/20 to-emerald-600/20 text-green-400 border border-green-500/30' : 'text-gray-300 hover:bg-slate-800/50 hover:text-green-400' }}">
                                <svg class="mr-3 h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="flex-1">Executions</span>
                                @if(request()->routeIs('admin.executions.*'))
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                @endif
                            </a>
                        </nav>

                        <!-- Bottom Section -->
                        <div class="mt-8 pt-6 border-t border-slate-800/50">
                            <div class="px-4 py-3 bg-slate-800/30 rounded-xl border border-slate-700/50">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-white">Pro Plan</p>
                                        <p class="text-xs text-gray-400">Unlimited automation</p>
                                    </div>
                                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse status-online"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="flex flex-col flex-1 overflow-hidden">
                <!-- Top navigation -->
                <div class="relative z-10 flex-shrink-0 flex h-20 bg-slate-900/30 backdrop-blur-xl border-b border-slate-800/50">
                    <div class="flex-1 px-6 flex justify-between items-center">
                        <div class="flex-1 flex items-center">
                            <h1 class="text-2xl font-bold text-white">
                                @yield('header', 'Dashboard')
                            </h1>
                        </div>

                        <!-- Top Right Actions -->
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="relative p-2 text-gray-400 hover:text-cyan-400 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5.5-5.5L10 11V3L5 8v10"/>
                                </svg>
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                            </button>

                            <!-- Settings -->
                            <button class="relative p-2 text-gray-400 hover:text-purple-400 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>

                            <!-- Profile -->
                            <div class="relative">
                                <button class="flex items-center space-x-3 p-2 rounded-xl hover:bg-slate-800/30 transition-colors duration-200">
                                    <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
                                        <span class="text-sm font-bold text-white">A</span>
                                    </div>
                                    <span class="text-sm font-medium text-white hidden md:block">Admin</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content area -->
                <main class="flex-1 relative overflow-y-auto focus:outline-none">
                    <div class="py-8">
                        <div class="max-w-7xl mx-auto px-6 lg:px-8">
                            <!-- Flash Messages -->
                            @if(session('success'))
                                <div class="mb-6 notification-enter">
                                    <div class="bg-gradient-to-r from-green-500/20 to-emerald-600/20 border border-green-500/30 text-green-400 px-6 py-4 rounded-xl backdrop-blur-sm flex items-center space-x-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>{{ session('success') }}</span>
                                    </div>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="mb-6 notification-enter">
                                    <div class="bg-gradient-to-r from-red-500/20 to-pink-600/20 border border-red-500/30 text-red-400 px-6 py-4 rounded-xl backdrop-blur-sm flex items-center space-x-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        <span>{{ session('error') }}</span>
                                    </div>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="mb-6 notification-enter">
                                    <div class="bg-gradient-to-r from-yellow-500/20 to-orange-600/20 border border-yellow-500/30 text-yellow-400 px-6 py-4 rounded-xl backdrop-blur-sm">
                                        <div class="flex items-start space-x-3">
                                            <svg class="w-5 h-5 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.464-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            <div>
                                                <strong class="font-bold">There are some errors:</strong>
                                                <ul class="mt-2 space-y-1 text-sm">
                                                    @foreach ($errors->all() as $error)
                                                        <li class="flex items-center space-x-2">
                                                            <span class="w-1 h-1 bg-yellow-400 rounded-full"></span>
                                                            <span>{{ $error }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
