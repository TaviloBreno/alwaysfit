<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgressLog;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        $logs = ProgressLog::with('training')
            ->where('user_id', $request->user()->id)
            ->orderBy('completed_at', 'desc')
            ->get();

        return response()->json($logs);
    }
}
