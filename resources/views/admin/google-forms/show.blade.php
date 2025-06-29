@extends('layouts.admin')

@section('title', $googleForm->name)
@section('header', $googleForm->name)

@section('content')
    <div class="space-y-6">
        <!-- Header Actions -->
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ $googleForm->name }}</h3>
                <p class="text-sm text-gray-500">{{ $googleForm->description }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.google-forms.edit', $googleForm) }}" class="btn btn-secondary">Edit</a>
                <button type="button" onclick="toggleExecuteModal()" class="btn btn-primary">Jalankan Eksekusi</button>
            </div>
        </div>

        <!-- Form Info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <!-- Form Details -->
                <div class="card p-6 mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Detail Form</h4>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Form ID</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $googleForm->form_id }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $googleForm->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $googleForm->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">URL Form</dt>
                            <dd class="mt-1 text-sm text-gray-900 break-all">
                                <a href="{{ $googleForm->form_url }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800">{{ $googleForm->form_url }}</a>
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Form Fields -->
                <div class="card p-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Form Fields ({{ $googleForm->fields->count() }})</h4>
                    <div class="space-y-4">
                        @forelse($googleForm->fields as $field)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h5 class="font-medium text-gray-900">{{ $field->field_name }}</h5>
                                        <p class="text-sm text-gray-500">ID: {{ $field->field_id }}</p>
                                        <div class="mt-2">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ ucfirst($field->value_type) }}
                                            </span>
                                            <span class="ml-2 text-sm text-gray-600">
                                                @if ($field->value_type === 'fixed')
                                                    {{ $field->value_data['value'] ?? 'Tidak ada nilai' }}
                                                @elseif($field->value_type === 'random')
                                                    {{ $field->value_data['min'] ?? 1 }} -
                                                    {{ $field->value_data['max'] ?? 100 }}
                                                @elseif($field->value_type === 'list')
                                                    {{ implode(', ', array_slice($field->value_data['items'] ?? [], 0, 3)) }}{{ count($field->value_data['items'] ?? []) > 3 ? '...' : '' }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 text-gray-500">
                                Belum ada field yang dikonfigurasi.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar Stats -->
            <div class="space-y-6">
                <div class="card p-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Statistik</h4>
                    <dl class="space-y-3">
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Total Eksekusi</dt>
                            <dd class="text-sm font-medium text-gray-900">{{ $googleForm->executions->count() }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Total Respons</dt>
                            <dd class="text-sm font-medium text-gray-900">
                                {{ $googleForm->executions->sum('completed_responses') }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="text-sm text-gray-500">Respons Gagal</dt>
                            <dd class="text-sm font-medium text-gray-900">
                                {{ $googleForm->executions->sum('failed_responses') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Recent Executions -->
        <div class="card">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-lg font-medium text-gray-900">Eksekusi Terakhir</h4>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Progress</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($googleForm->executions->take(10) as $execution)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $execution->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-600 h-2 rounded-full"
                                                style="width: {{ $execution->progress_percentage }}%"></div>
                                        </div>
                                        <span
                                            class="text-xs">{{ $execution->completed_responses + $execution->failed_responses }}/{{ $execution->total_responses }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if ($execution->status === 'completed') bg-green-100 text-green-800
                                @elseif($execution->status === 'running') bg-yellow-100 text-yellow-800
                                @elseif($execution->status === 'failed') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($execution->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $execution->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.executions.show', $execution) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada eksekusi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Execute Modal -->
    <div id="executeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Jalankan Eksekusi</h3>
                <form action="{{ route('admin.executions.execute', $googleForm) }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="exec_name" class="block text-sm font-medium text-gray-700">Nama Eksekusi</label>
                            <input type="text" name="name" id="exec_name" class="form-input mt-1" required>
                        </div>

                        <div>
                            <label for="total_responses" class="block text-sm font-medium text-gray-700">Jumlah
                                Respons</label>
                            <input type="number" name="total_responses" id="total_responses" class="form-input mt-1"
                                min="1" max="10000" value="100" required>
                        </div>

                        <div>
                            <label for="delay_seconds" class="block text-sm font-medium text-gray-700">Delay
                                (detik)</label>
                            <input type="number" name="delay_seconds" id="delay_seconds" class="form-input mt-1"
                                min="1" max="300" value="5" required>
                            <p class="mt-1 text-sm text-gray-500">Jarak waktu antar pengiriman untuk menghindari spam
                                detection</p>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" onclick="toggleExecuteModal()" class="btn btn-secondary">Batal</button>
                        <button type="submit" class="btn btn-primary">Mulai Eksekusi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function toggleExecuteModal() {
                const modal = document.getElementById('executeModal');
                modal.classList.toggle('hidden');
            }
        </script>
    @endpush
@endsection
