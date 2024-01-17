<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Repositories;

use Juste\TodoApp\Models\Task;
use PDO;

class TaskRepository
{
    public function __construct(private PDO $connection)
    {
    }

    public function getList(): array
    {
        $result = [];
        $statement = $this->connection->prepare('SELECT * FROM task');
        $statement->execute();

        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tasks as $task) {
            $result[] = new Task(
                $task['id'],
                $task['task_name'],
                $task['task_description'],
                $task['created_at'],
                $task['updated_at'],
                $task['status'],
                $task['active']
            );
        }

        return $result;
    }

    public function findTaskById(string $id): ?Task
    {
        $query = "SELECT * FROM task WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->execute(
            ['id' => $id]
        );

        $task = $statement->fetch(PDO::FETCH_ASSOC);

        return ($task) ?
            new Task(
                $task['id'],
                $task['task_name'],
                $task['task_description'],
                $task['created_at'],
                $task['updated_at'],
                $task['status'],
                $task['active']
            ) : null;
    }

    public function createTask(Task $task): bool
    {
        $query = "INSERT INTO task (id, task_name, task_description, created_at, updated_at, status, active)
                    VALUES (:id, :task_name, :task_description, :created_at, :updated_at, :status, :active)";
        $statement = $this->connection->prepare($query);


        return $statement->execute([
            'id' => $task->getTaskId(),
            'task_name' => $task->getTaskName(),
            'task_description' => $task->getTaskDescription(),
            'created_at' => $task->getCreatedAt(),
            'updated_at' => $task->getUpdatedAt(),
            'status' => $task->getStatus(),
            'active' => $task->getActive()
        ]);
    }
}
