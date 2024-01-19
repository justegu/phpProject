<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Framework;

use Juste\TodoApp\Controllers\TaskController;
use Juste\TodoApp\Controllers\HomePageController;
use Juste\TodoApp\Controllers\PageNotFoundController;

class Router
{
    public function __construct(
        private HomePageController $homePageController,
        private PageNotFoundController $pageNotFoundController,
        private TaskController $taskController
    ) {
    }

    public function process(string $route, string $requestMethod, array $requestData): void
    {
        switch ($route) {
            case '/list':
                $this->taskController->list();
                break;
            case '/store':
                $this->taskController->store($requestData);
                break;
            case '/create':
                $this->taskController->create();
                break;
            case strpos($route, '/delete/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->delete($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/edit/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->edit($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/update/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->update($id, $_POST);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/mark-as-completed/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->toggleMarkAsCompleted($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/active/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->toggleActive($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/task/mark-as-completed/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->taskPageToggleMarkAsCompleted($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/task/active/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->taskPageToggleActive($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            case strpos($route, '/task/') === 0:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->details($id);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
            default:
                $this->homePageController->index();
                break;
        }
    }

    private function getTaskId(string $route): ?string
    {
        $parts = explode('/', $route);
        $taskId = end($parts);

        return ($taskId !== false && $taskId !== 'task') ? $taskId : null;
    }


}
