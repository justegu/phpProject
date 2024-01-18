<?php

declare(strict_types=1);

use Juste\TodoApp\Framework\DIContainer;
use Juste\TodoApp\Framework\Router;

require_once 'vendor/autoload.php';

$container = new DIContainer();
$container->loadDependencies();

$requestUri = str_replace('/Paskaitos/todo_app', '', $_SERVER['REQUEST_URI']);
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = $container->get(Router::class);
$router->process($requestUri, $requestMethod, $_POST);



//Task Project (ToDo)
//1. Projektas turetu buti aprasytas naudojant MVC architektura. (Turetu buti sukurtas index.php failas ir visi requestai turi buti nukreipti i ji.)
//2. Naudoti GIT (Projektas turetu buti sukeltas i GitHub private repositorija ir tureciau gauti invite prie repositorijos: Alfr3d)
//3. Projekte turetu buti naudojamas COMPOSER’is (autoloader, logger, smarty)
//4. Projektas turi buti pajungtas prie Duomenu Bazes (Database Name: task_project. Joje turetu buti sukurta lentele “task” [id, created_at, updated_at, name, description, status, active]);
//- Endpoints:
//- /task-project/list - isvedamas visu turimu task’u listas.
//- /task-project/create - forma naujo tasko sukurimui.
//- /task-project/store - saugojimas naujo tasko i duomenu baze.
//- /task-project/delete/id - tasko istrinimas
//- /task-project/edit/id - atsidaro forma su tasko informacija, kur galima redaguoti taska
//- /task-project/update/id - paupdatina tasko info DB
//- /task-project/mark-as-completed - pakeicia tasko statusa i completed. [Jei reikalingas]
//5. Padaryti atvaizdavimu reikalingu elementu (forma, task’u lentele ir t.t).
//6. Sukurti README.md faila ir i ji trumpai aprasyti kaip veikia projektas ir kas yra padaryta.