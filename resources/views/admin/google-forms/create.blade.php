@extends('layouts.admin')

@section('title', 'Tambah Google Form')
@section('header', 'Tambah Google Form')

@section('content')
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('admin.google-forms.store') }}" method="POST" x-data="formBuilder()">
            @csrf

            <div class="space-y-6">
                <!-- Basic Information -->
                <div class="card p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Form</label>
                            <input type="text" name="name" id="name" class="form-input mt-1" required
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="form_id" class="block text-sm font-medium text-gray-700">Form ID</label>
                            <input type="text" name="form_id" id="form_id" class="form-input mt-1" required
                                value="{{ old('form_id') }}" placeholder="1FAIpQLSe...">
                            @error('form_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="form_url" class="block text-sm font-medium text-gray-700">Form URL</label>
                            <input type="url" name="form_url" id="form_url" class="form-input mt-1" required
                                value="{{ old('form_url') }}" placeholder="https://docs.google.com/forms/d/e/...">
                            @error('form_url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="3" class="form-input mt-1">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Fields -->
                <div class="card p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Form Fields</h3>
                        <button type="button" @click="addField()" class="btn btn-primary">
                            Tambah Field
                        </button>
                    </div>

                    <div class="space-y-4">
                        <template x-for="(field, index) in fields" :key="index">
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="font-medium text-gray-900" x-text="'Field ' + (index + 1)"></h4>
                                    <button type="button" @click="removeField(index)"
                                        class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Nama Field</label>
                                        <input type="text" :name="'fields[' + index + '][field_name]'"
                                            x-model="field.field_name" class="form-input mt-1" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Field ID</label>
                                        <input type="text" :name="'fields[' + index + '][field_id]'"
                                            x-model="field.field_id" class="form-input mt-1" required
                                            placeholder="entry.123456789">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Tipe Nilai</label>
                                        <select :name="'fields[' + index + '][value_type]'" x-model="field.value_type"
                                            class="form-select mt-1" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="fixed">Nilai Tetap</option>
                                            <option value="random">Nilai Acak</option>
                                            <option value="list">Dari Daftar</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Data Nilai</label>
                                        <div x-show="field.value_type === 'fixed'">
                                            <input type="text" :name="'fields[' + index + '][value_data]'"
                                                x-model="field.value_data" class="form-input mt-1"
                                                placeholder="Nilai tetap">
                                        </div>
                                        <div x-show="field.value_type === 'random'">
                                            <input type="text" :name="'fields[' + index + '][value_data]'"
                                                x-model="field.value_data" class="form-input mt-1" placeholder="1-100">
                                        </div>
                                        <div x-show="field.value_type === 'list'">
                                            <input type="text" :name="'fields[' + index + '][value_data]'"
                                                x-model="field.value_data" class="form-input mt-1"
                                                placeholder="Opsi1, Opsi2, Opsi3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div x-show="fields.length === 0" class="text-center py-8 text-gray-500">
                        Belum ada field. Klik "Tambah Field" untuk memulai.
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.google-forms.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Form</button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function formBuilder() {
                return {
                    fields: [],

                    addField() {
                        this.fields.push({
                            field_name: '',
                            field_id: '',
                            value_type: '',
                            value_data: ''
                        });
                    },

                    removeField(index) {
                        this.fields.splice(index, 1);
                    }
                }
            }
        </script>
    @endpush
@endsection
