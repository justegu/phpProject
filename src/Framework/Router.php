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
            case '/':
                $this->homePageController->index();
                break;
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
            case '/mark-as-completed':
//                $this->taskController->;
//                break;
            default:
                $id = $this->getTaskId($route);
                if ($id !== null) {
                    $this->taskController->details($id);
                } else {
                    $this->pageNotFoundController->index();
                }
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
