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
            default:
                $taskNumber = $this->getTaskNumberFromRoute($route);
                if (null !== $taskNumber) {
                    $this->taskController->details($taskNumber);
                } else {
                    $this->pageNotFoundController->index();
                }
                break;
        }
    }

    private function getTaskNumberFromRoute(string $route): ?string
    {
        if(strpos($route,"/" ) !== false){

            $result = str_replace('/' , "" , $route);

            if (!$result) {
                $result = null;
            }

        } else {
            $result = null;
        }

        return $result;
    }
}
