<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class LogController extends Controller
{
    public function index()
    {
        return view('admin.logs.index', [
            'logs' => ActivityLog::latest()->paginate(20)
        ]);
    }
}
