<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleForm;
use Illuminate\Http\Request;

class GoogleFormController extends Controller
{
    public function index()
    {
        $forms = GoogleForm::withCount(['executions', 'fields'])->paginate(10);
        return view('admin.google-forms.index', compact('forms'));
    }

    public function create()
    {
        return view('admin.google-forms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'form_id' => 'required|string|max:255',
            'form_url' => 'required|url',
            'description' => 'nullable|string',
            'fields' => 'required|array|min:1',
            'fields.*.field_name' => 'required|string',
            'fields.*.field_id' => 'required|string',
            'fields.*.value_type' => 'required|in:fixed,random,list',
            'fields.*.value_data' => 'required'
        ]);

        $form = GoogleForm::create([
            'name' => $validated['name'],
            'form_id' => $validated['form_id'],
            'form_url' => $validated['form_url'],
            'description' => $validated['description']
        ]);

        foreach ($validated['fields'] as $index => $fieldData) {
            $valueData = $this->processValueData($fieldData['value_type'], $fieldData['value_data']);

            $form->fields()->create([
                'field_name' => $fieldData['field_name'],
                'field_id' => $fieldData['field_id'],
                'value_type' => $fieldData['value_type'],
                'value_data' => $valueData,
                'order' => $index
            ]);
        }

        return redirect()->route('admin.google-forms.index')
            ->with('success', 'Google Form berhasil ditambahkan!');
    }

    public function show(GoogleForm $googleForm)
    {
        $googleForm->load(['fields', 'executions.logs']);
        return view('admin.google-forms.show', compact('googleForm'));
    }

    public function edit(GoogleForm $googleForm)
    {
        $googleForm->load('fields');
        return view('admin.google-forms.edit', compact('googleForm'));
    }

    public function update(Request $request, GoogleForm $googleForm)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'form_id' => 'required|string|max:255',
            'form_url' => 'required|url',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'fields' => 'required|array|min:1',
            'fields.*.field_name' => 'required|string',
            'fields.*.field_id' => 'required|string',
            'fields.*.value_type' => 'required|in:fixed,random,list',
            'fields.*.value_data' => 'required'
        ]);

        $googleForm->update([
            'name' => $validated['name'],
            'form_id' => $validated['form_id'],
            'form_url' => $validated['form_url'],
            'description' => $validated['description'],
            'is_active' => $validated['is_active'] ?? true
        ]);

        // Update fields
        $googleForm->fields()->delete();
        foreach ($validated['fields'] as $index => $fieldData) {
            $valueData = $this->processValueData($fieldData['value_type'], $fieldData['value_data']);

            $googleForm->fields()->create([
                'field_name' => $fieldData['field_name'],
                'field_id' => $fieldData['field_id'],
                'value_type' => $fieldData['value_type'],
                'value_data' => $valueData,
                'order' => $index
            ]);
        }

        return redirect()->route('admin.google-forms.show', $googleForm)
            ->with('success', 'Google Form berhasil diupdate!');
    }

    public function destroy(GoogleForm $googleForm)
    {
        $googleForm->delete();
        return redirect()->route('admin.google-forms.index')
            ->with('success', 'Google Form berhasil dihapus!');
    }

    private function processValueData(string $type, $data): array
    {
        switch ($type) {
            case 'fixed':
                return ['value' => $data];

            case 'random':
                if (is_array($data)) {
                    return $data;
                }
                // Jika string, coba parse range (contoh: "1-100")
                if (strpos($data, '-') !== false) {
                    [$min, $max] = explode('-', $data, 2);
                    return ['min' => (int)$min, 'max' => (int)$max];
                }
                return ['min' => 1, 'max' => 100];

            case 'list':
                if (is_array($data)) {
                    return ['items' => $data];
                }
                // Jika string, split by comma
                $items = array_map('trim', explode(',', $data));
                return ['items' => $items];

            default:
                return [];
        }
    }
}
