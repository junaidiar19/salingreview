<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskReviewerController extends Controller
{
    public function index($taskId)
    {
        $task = Task::findOrFail($taskId);
        
        $data = [
            'task' => $task,
        ];

        return view('pages.admin.tasks.reviewers.index', $data);
    }
}
