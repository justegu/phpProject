<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Controllers;

use DateTimeImmutable;
use DateTimeZone;
use Juste\TodoApp\Models\Task;
use Juste\TodoApp\Repositories\TaskRepository;

class TaskController
{
    public function __construct(
        private TaskRepository $taskRepository,
        private \Smarty $smarty
    ) {
    }

    public function list(): void
    {
        $list = $this->taskRepository->getList();

        $this->smarty->assign('list', $list);
        $this->smarty->display('./src/Views/TasksList.tpl');
    }

    public function details(string $id): void
    {
        $task = $this->taskRepository->findTaskById($id);

        if(!$task){
            dd('Task not found');
        }
        $this->smarty->assign('task', $task);
        $this->smarty->display('./src/Views/Task.tpl');

    }

    public function store(array $taskData): void
    {
        // Validation
        if(!$taskData){
            throw new \Exception('Data empty');
        }

        $createdAt = isset($taskData['created_at']) && $taskData['created_at'] !== null
            ? new DateTimeImmutable($taskData['created_at'])
            : null;

        $updatedAt = isset($taskData['updated_at']) && $taskData['updated_at'] !== null
            ? new DateTimeImmutable($taskData['updated_at'])
            : null;

        $status = $_POST['status'] ?? 'not_completed';
        $active = $_POST['active'] ?? 'not_active';

        $statusBool = $status === 'completed' ? true : false;
        $activeBool = $active === 'active' ? true : false;

        $task = new Task(
            (int)($taskData['id'] ?? 0),
            (string)$taskData['task_name'],
            (string)$taskData['task_description'],
            $createdAt,
            $updatedAt,
            $statusBool,
            $activeBool,
        );
        if ($task) {
            $this->taskRepository->createTask($task);
            header('Location: /Paskaitos/todo_app/list');
        } else {
            dd('Failed to create task');
        }
    }

    public function create(): void
    {
        $this->smarty->display('./src/Views/TaskCreateForm.tpl');
    }

    public function delete(string $id): void
    {
        $success = $this->taskRepository->deleteTask($id);

        if ($success) {
            header('Location: /Paskaitos/todo_app/list');
        } else {
            dd('Failed to delete task');
        }
    }

    public function edit(string $id): void
    {
        $task = $this->taskRepository->findTaskById($id);

        if (!$task) {
            dd('Task not found');
        }

        $this->smarty->assign('task', $task);
        $this->smarty->display('./src/Views/TaskEditForm.tpl');
    }


    public function update(string $id, array $updatedData): void
    {
        $task = $this->taskRepository->findTaskById($id);

        if (!$task) {
            throw new \Exception('Task not found');
        }

        $updatedAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Vilnius'));

        $updatedTask = new Task(
            $task->getTaskId(),
            (string)($updatedData['task_name'] ?? $task->getTaskName()),
            (string)($updatedData['task_description'] ?? $task->getTaskDescription()),
            $task->getCreatedAt(),
            $updatedAt,
            $task->getStatus(),
            $task->getActive()
        );

        $this->taskRepository->updateTask($updatedTask);

        header('Location: /Paskaitos/todo_app/task/' . $id);
    }

    public function taskPageToggleMarkAsCompleted(string $id): void
    {
        $this->toggleMarkAsCompleted($id);
        header('Location: /Paskaitos/todo_app/task/' . $id);
    }

    public function toggleMarkAsCompleted(string $id): void
    {
        $task = $this->taskRepository->findTaskById($id);

        if (!$task) {
            throw new \Exception('Task not found');
        }
        $updatedAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Vilnius'));

        $updatedTask = new Task(
            $task->getTaskId(),
            $task->getTaskName(),
            $task->getTaskDescription(),
            $task->getCreatedAt(),
            $updatedAt,
            !$task->getStatus(),
            $task->getActive()
        );

        $this->taskRepository->updateTask($updatedTask);

        header('Location: /Paskaitos/todo_app/list');
    }

    public function taskPageToggleActive(string $id): void
    {
        $this->toggleActive($id);
        header('Location: /Paskaitos/todo_app/task/' . $id);
    }
    public function toggleActive(string $id): void
    {
        $task = $this->taskRepository->findTaskById($id);

        if (!$task) {
            throw new \Exception('Task not found');
        }
        $updatedAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Vilnius'));

        $updatedTask = new Task(
            $task->getTaskId(),
            $task->getTaskName(),
            $task->getTaskDescription(),
            $task->getCreatedAt(),
            $updatedAt,
            $task->getStatus(),
            !$task->getActive()
        );

        $this->taskRepository->updateTask($updatedTask);

        header('Location: /Paskaitos/todo_app/list');
    }


}
