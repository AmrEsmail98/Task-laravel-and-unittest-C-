<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use App\Models\Admin;
use App\Models\User;
use App\Models\Statistic;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks()
    {
        return Task::with(['user', 'admin'])->get();
    }

    public function getAllAdmins()
    {
        return Admin::get();
    }

    public function getAllUsers()
    {
        return User::get();
    }

    public function createTask($data)
    {
        return Task::create($data);
    }

    public function getTopUsers()
    {
        return Statistic::with('user')
            ->orderByDesc('tasks_count')
            ->take(10)
            ->get();
    }
}
