<?php

namespace App\Http\Controllers;
use App\Http\Requests\Task\Store;
use App\Jobs\UpdateUserStatistics;
use App\Models\Admin;
use App\Models\Statistic;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller {

    public function index() {
     
        $tasks = Task::with(['user', 'admin'])->get();
        return view('task.index', compact('tasks'));
    }

    public function create() {

        $admins = Admin::get();
        $users  = User::get();
        return view('task.create', get_defined_vars());
    }

    public function store(Store $request) {

        Task::create($request->validated());
        UpdateUserStatistics::dispatch($request['user_id']);
        return redirect()->route('task.index');
    }

    public function statistics() {

        $topUsers = Statistic::with('user')
            ->orderByDesc('tasks_count')
            ->take(10)
            ->get();
        return view('task.statistics', compact('topUsers'));
    }
}
