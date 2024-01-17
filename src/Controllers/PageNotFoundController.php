<?php

declare(strict_types = 1);

namespace Juste\TodoApp\Controllers;

class PageNotFoundController
{
    public function __construct(
        private \Smarty $smarty
    ) {
    }
    public function index()
    {
        $this->smarty->display('./src/Views/PageNotFound.tpl');
    }
}