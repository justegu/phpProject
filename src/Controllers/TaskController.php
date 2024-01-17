<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Controllers;

use Juste\TodoApp\Models\Task;
use Juste\TodoApp\Repositories\TaskRepository;

class TaskController
{
    public function __construct(
        private TaskRepository $taskRepository,
        private \Smarty $smarty
    ) {
    }

    public function list()
    {
        $list = $this->taskRepository->getList();

        $this->smarty->assign('list', $list);
        $this->smarty->display('./src/Views/TasksList.tpl');
    }

    public function details(string $task_id)
    {
        $task = $this->taskRepository->findTaskById($task_id);

        if(!$task){
            dd('Task not found');
        }
        $this->smarty->assign('task', $task);
        $this->smarty->display('./src/Views/Task.tpl');

    }

    public function store(array $taskData)
    {
        // Validation
        if(!$taskData){
            throw new \Exception('Data empty');
        }

        $task = new Task(
            (string) $taskData['task_id'],
            (string) $taskData['task_name'],
            (string) $taskData['task_description'],
            new \DateTimeImmutable($taskData['created_at']),
            new \DateTimeImmutable($taskData['updated_at']),
            (bool) $taskData['status'],
            (bool) $taskData['active']
    );

        $this->taskRepository->createTask($task);
        header('Location: /Paskaitos/todo_app/list');
    }

    public function create()
    {
        $this->smarty->display('./src/Views/TaskCreateForm.tpl');
    }
}
