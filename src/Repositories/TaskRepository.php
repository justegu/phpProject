<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Repositories;

use DateTimeImmutable;
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
                new DateTimeImmutable($task['created_at']),
                new DateTimeImmutable($task['updated_at']),
                (bool)$task['status'],
                (bool)$task['active']
            );
        }

        return $result;
    }

    public function findTaskById(string $id): ?Task
    {
        $query = "SELECT * FROM task WHERE id = :id;";
        $statement = $this->connection->prepare($query);
        $statement->execute(['id' => $id]);

        $task = $statement->fetch(PDO::FETCH_ASSOC);

        return ($task) ?
            new Task(
                $task['id'],
                $task['task_name'],
                $task['task_description'],
                new DateTimeImmutable($task['created_at']),
                new DateTimeImmutable($task['updated_at']),
                (bool)$task['status'],
                (bool)$task['active']
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

    public function deleteTask(string $id): bool
    {
        $query = "DELETE FROM task WHERE id = :id";
        $statement = $this->connection->prepare($query);

        return $statement->execute(['id' => $id]);
    }

    public function updateTask(Task $task): void
    {
        $query = "UPDATE task SET 
            task_name = :task_name,
            task_description = :task_description,
            created_at = :created_at,
            updated_at = :updated_at,
            status = :status,
            active = :active
            WHERE id = :id";

        $statement = $this->connection->prepare($query);
        $statement->execute([
            ':id' => $task->getTaskId(),
            ':task_name' => $task->getTaskName(),
            ':task_description' => $task->getTaskDescription(),
            ':created_at' => $task->getCreatedAt()->format('Y-m-d H:i:s'),
            ':updated_at' => $task->getUpdatedAt()->format('Y-m-d H:i:s'),
            ':status' => $task->getStatus(),
            ':active' => $task->getActive(),
        ]);

    }


}
