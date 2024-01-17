<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Controllers;

class HomePageController
{
    public function __construct(
       private \Smarty $smarty
    ) {
    }

    public function index()
    {
        $this->smarty->display('./src/Views/Home.tpl');
    }
}