<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoogleForm;
use App\Models\FormExecution;
use App\Models\ExecutionLog;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_forms' => GoogleForm::count(),
            'active_forms' => GoogleForm::where('is_active', true)->count(),
            'total_executions' => FormExecution::count(),
            'running_executions' => FormExecution::where('status', 'running')->count(),
            'total_responses' => ExecutionLog::where('status', 'success')->count(),
            'failed_responses' => ExecutionLog::where('status', 'failed')->count(),
        ];

        $recent_executions = FormExecution::with('googleForm')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_executions'));
    }
}
