<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Models;


use DateTimeImmutable;

class Task
{
    public function __construct(
        private int $id,
        private string $task_name,
        private string $task_description,
        private ?DateTimeImmutable $created_at,
        private ?DateTimeImmutable  $updated_at,
        private bool $status,
        private bool $active
    ) {
    }

    public function getTaskId(): int
    {
        return $this->id;
    }

    public function getTaskName(): string
    {
        return $this->task_name;
    }

    public function getTaskDescription(): string
    {
        return $this->task_description;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

}
