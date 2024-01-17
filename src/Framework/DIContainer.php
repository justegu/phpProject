<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Framework;

use Juste\TodoApp\Controllers\TaskController;
use Juste\TodoApp\Controllers\HomePageController;
use Juste\TodoApp\Controllers\PageNotFoundController;
use Juste\TodoApp\Repositories\TaskRepository;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use RuntimeException;

class DIContainer
{
    private array $entries = [];

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new RuntimeException('Class ' . $id . 'not found in container.');
        }
        $entry = $this->entries[$id];

        return $entry($this);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $callable): void
    {
        $this->entries[$id] = $callable;
    }

    public function loadDependencies()
    {
        $this->set(
            Logger::class,
            function (DIContainer $container) {
                $logger = new Logger('todo_app');
                $logger->pushHandler(new StreamHandler('./src/Public/todo-app-project.log', Level::Warning));

                return $logger;
            }
        );

        $this->set(
            Router::class,
            function (DIContainer $container) {
                return new Router(
                    $this->get(HomePageController::class),
                    $this->get(PageNotFoundController::class),
                    $this->get(TaskController::class)
                );
            }
        );

        $this->set(
            TaskController::class,
            function (DIContainer $container) {
                return new TaskController(
                    $this->get(TaskRepository::class),
                    $this->get(\Smarty::class)
                );
            }
        );

        $this->set(
            HomePageController::class,
            function (DIContainer $container) {
                return new HomePageController(
                    $this->get(\Smarty::class)
                );
            }
        );

        $this->set(
            PageNotFoundController::class,
            function (DIContainer $container) {
                return new PageNotFoundController(
                    $this->get(\Smarty::class)
                );
            }
        );

        $this->set(
            DbConnection::class,
            function (DIContainer $container) {
                $instance = DbConnection::getInstance();
                return $instance->getConnection();
            }
        );

        $this->set(
            TaskRepository::class,
            function (DIContainer $container) {
                return new TaskRepository($this->get(DbConnection::class));
            }
        );

        $this->set(
            \Smarty::class,
            function (DIContainer $container) {
                return new \Smarty();
            }
        );
    }
}
