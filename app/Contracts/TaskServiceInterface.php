<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskServiceInterface
{
    /**
     * Get all tasks.
     *
     * @return Collection
     */
    public function getAllTasks(): Collection;

    /**
     * Get a task by ID.
     *
     * @param int $id
     * @return Task|null
     */
    public function getTaskById(int $id): ?Task;

    /**
     * Create a new task.
     *
     * @param array $data
     * @return Task
     */
    public function createTask(array $data): Task;

    /**
     * Update a task.
     *
     * @param int $id
     * @param array $data
     * @return Task|null
     */
    public function updateTask(int $id, array $data): ?Task;

    /**
     * Delete a task.
     *
     * @param int $id
     * @return bool
     */
    public function deleteTask(int $id): bool;
}

