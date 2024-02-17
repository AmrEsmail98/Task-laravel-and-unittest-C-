<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{
    public function getAllTasks();
    public function getAllAdmins();
    public function getAllUsers();
    public function createTask($data);
    public function getTopUsers();
}
