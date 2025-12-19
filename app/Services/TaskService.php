<?php

namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService implements TaskServiceInterface
{
    /**
     * Get all tasks.
     *
     * @return Collection
     */
    public function getAllTasks(): Collection
    {
        return Task::all();
    }

    /**
     * Get a task by ID.
     *
     * @param int $id
     * @return Task|null
     */
    public function getTaskById(int $id): ?Task
    {
        return Task::find($id);
    }

    /**
     * Create a new task.
     *
     * @param array $data
     * @return Task
     */
    public function createTask(array $data): Task
    {
        return Task::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'status'      => $data['status'] ?? 'pending',
        ]);
    }

    /**
     * Update a task.
     *
     * @param int $id
     * @param array $data
     * @return Task|null
     */
    public function updateTask(int $id, array $data): ?Task
    {
        $task = $this->getTaskById($id);

        if (!$task) {
            return null;
        }

        $task->update($data);

        return $task->fresh();
    }

    /**
     * Delete a task.
     *
     * @param int $id
     * @return bool
     */
    public function deleteTask(int $id): bool
    {
        $task = $this->getTaskById($id);

        if (!$task) {
            return false;
        }

        return $task->delete();
    }
}

