<?php

namespace App\Http\Controllers;
use App\Http\Requests\Task\Store;
use App\Jobs\UpdateUserStatistics;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskController extends Controller {

    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function index() {
        $tasks = $this->taskRepository->getAllTasks();
        return view('task.index', compact('tasks'));
    }

    public function create() {
        $admins = $this->taskRepository->getAllAdmins();
        $users  = $this->taskRepository->getAllUsers();
        return view('task.create', get_defined_vars());
    }

    public function store(Store $request) {
        $this->taskRepository->createTask($request->validated());
        UpdateUserStatistics::dispatch($request['user_id']);
        return redirect()->route('task.index');
    }

    public function statistics() {
        $topUsers = $this->taskRepository->getTopUsers();
        return view('task.statistics', compact('topUsers'));
    }
}
