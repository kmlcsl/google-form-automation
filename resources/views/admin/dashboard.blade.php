@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard Overview')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-purple-600/10 rounded-2xl blur-xl"></div>
            <div class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Welcome back, Admin! 👋</h2>
                        <p class="text-gray-400">Here's what's happening with your form automation today.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <p class="text-sm text-gray-400">Current Time</p>
                                <p class="text-lg font-semibold text-cyan-400" id="current-time">
                                    {{ now()->format('H:i:s') }}</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center animate-pulse-glow">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Forms Card -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-cyan-600/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-blue-500/50 transition-all duration-300 card-hover-dark">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 mb-1">Total Forms</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['total_forms'] }}</p>
                            <p class="text-sm text-green-400 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                +2 this week
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 w-full bg-slate-700 rounded-full h-2 progress-bar">
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2 rounded-full"
                            style="width: {{ min(($stats['total_forms'] / 10) * 100, 100) }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Active Forms Card -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-emerald-600/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-green-500/50 transition-all duration-300 card-hover-dark">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 mb-1">Active Forms</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['active_forms'] }}</p>
                            <p class="text-sm text-green-400 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                                {{ round(($stats['active_forms'] / max($stats['total_forms'], 1)) * 100) }}% active
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 w-full bg-slate-700 rounded-full h-2 progress-bar">
                        <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full"
                            style="width: {{ $stats['total_forms'] > 0 ? round(($stats['active_forms'] / $stats['total_forms']) * 100) : 0 }}%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Running Executions Card -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-yellow-500/20 to-orange-600/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-yellow-500/50 transition-all duration-300 card-hover-dark">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 mb-1">Running Executions</p>
                            <p class="text-3xl font-bold text-white">{{ $stats['running_executions'] }}</p>
                            <p
                                class="text-sm {{ $stats['running_executions'] > 0 ? 'text-yellow-400' : 'text-gray-500' }} mt-2 flex items-center">
                                @if ($stats['running_executions'] > 0)
                                    <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse mr-2"></div>
                                    Active now
                                @else
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    All idle
                                @endif
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 w-full bg-slate-700 rounded-full h-2 progress-bar">
                        <div class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 rounded-full {{ $stats['running_executions'] > 0 ? 'animate-pulse' : '' }}"
                            style="width: {{ min($stats['running_executions'] * 25, 100) }}%"></div>
                    </div>
                </div>
            </div>

            <!-- Total Responses Card -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-600/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-purple-500/50 transition-all duration-300 card-hover-dark">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 mb-1">Total Responses</p>
                            <p class="text-3xl font-bold text-white">{{ number_format($stats['total_responses']) }}</p>
                            <p class="text-sm text-purple-400 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Success rate:
                                {{ $stats['total_responses'] > 0 ? round((($stats['total_responses'] - $stats['failed_responses']) / $stats['total_responses']) * 100, 1) : 0 }}%
                            </p>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 w-full bg-slate-700 rounded-full h-2 progress-bar">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-2 rounded-full" style="width: 85%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Quick Create Form -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-cyan-500/50 transition-all duration-300 card-hover-dark">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Create New Form</h3>
                        <p class="text-gray-400 mb-4">Add a new Google Form to automate</p>
                        <a href="{{ route('admin.google-forms.create') }}" class="btn btn-primary w-full btn-glow">
                            Create Form
                        </a>
                    </div>
                </div>
            </div>

            <!-- View All Forms -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-purple-500/10 to-pink-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-purple-500/50 transition-all duration-300 card-hover-dark">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14-4H9m4 8H9m8 4H9m11 1V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h16a2 2 0 002-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Manage Forms</h3>
                        <p class="text-gray-400 mb-4">View and edit existing forms</p>
                        <a href="{{ route('admin.google-forms.index') }}"
                            class="btn bg-gradient-to-r from-purple-500 to-pink-600 text-white hover:from-purple-600 hover:to-pink-700 w-full btn-glow">
                            View Forms
                        </a>
                    </div>
                </div>
            </div>

            <!-- View Executions -->
            <div class="group relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-green-500/10 to-emerald-600/10 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300">
                </div>
                <div
                    class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-6 hover:border-green-500/50 transition-all duration-300 card-hover-dark">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-white mb-2">Monitor Executions</h3>
                        <p class="text-gray-400 mb-4">Track automation progress</p>
                        <a href="{{ route('admin.executions.index') }}"
                            class="btn bg-gradient-to-r from-green-500 to-emerald-600 text-white hover:from-green-600 hover:to-emerald-700 w-full btn-glow">
                            View Executions
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Executions -->
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-500/5 to-gray-600/5 rounded-2xl blur-xl"></div>
            <div class="relative bg-slate-800/50 backdrop-blur-sm border border-slate-700/50 rounded-2xl overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-700/50 flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-cyan-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Recent Executions
                    </h3>
                    <a href="{{ route('admin.executions.index') }}"
                        class="text-cyan-400 hover:text-cyan-300 text-sm font-medium flex items-center transition-colors duration-200">
                        View All
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-slate-900/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Form</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Execution</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Progress</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Date</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700/50">
                            @forelse($recent_executions as $execution)
                                <tr class="hover:bg-slate-700/20 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-white">{{ $execution->googleForm->name }}
                                        </div>
                                        <div class="text-xs text-gray-400">ID: {{ $execution->googleForm->form_id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-white">{{ $execution->name }}</div>
                                        <div class="text-xs text-gray-400">
                                            {{ number_format($execution->total_responses) }} responses</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-1">
                                                <div class="flex items-center justify-between mb-1">
                                                    <span
                                                        class="text-xs text-gray-400">{{ $execution->progress_percentage }}%</span>
                                                    <span
                                                        class="text-xs text-gray-400">{{ $execution->completed_responses + $execution->failed_responses }}/{{ $execution->total_responses }}</span>
                                                </div>
                                                <div class="w-full bg-slate-700 rounded-full h-2 progress-bar">
                                                    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 h-2 rounded-full transition-all duration-300"
                                                        style="width: {{ $execution->progress_percentage }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    @if ($execution->status === 'completed') bg-green-500/20 text-green-400 border border-green-500/30
                                    @elseif($execution->status === 'running') bg-yellow-500/20 text-yellow-400 border border-yellow-500/30
                                    @elseif($execution->status === 'failed') bg-red-500/20 text-red-400 border border-red-500/30
                                    @else bg-gray-500/20 text-gray-400 border border-gray-500/30 @endif">
                                            @if ($execution->status === 'running')
                                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse mr-2"></div>
                                            @endif
                                            {{ ucfirst($execution->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $execution->created_at->format('M d, H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.executions.show', $execution) }}"
                                            class="text-cyan-400 hover:text-cyan-300 transition-colors duration-200">
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-16 h-16 bg-slate-700 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-white mb-2">No executions yet</h3>
                                            <p class="text-gray-400 mb-4">Create your first form and start automating!</p>
                                            <a href="{{ route('admin.google-forms.create') }}"
                                                class="btn btn-primary btn-glow">
                                                Create First Form
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Update current time every second
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('en-US', {
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                const timeElement = document.getElementById('current-time');
                if (timeElement) {
                    timeElement.textContent = timeString;
                }
            }

            // Update time immediately and then every second
            updateTime();
            setInterval(updateTime, 1000);

            // Auto-refresh running executions every 30 seconds
            @if ($stats['running_executions'] > 0)
                setTimeout(function() {
                    location.reload();
                }, 30000);
            @endif
        </script>
    @endpush
@endsection
