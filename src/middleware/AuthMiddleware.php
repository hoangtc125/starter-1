<?php

namespace app\src\middleware;

use app\src\core\Application;
use app\src\core\exception\ForbiddenException;
use app\src\core\middleware\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (in_array(Application::$app->controller->action, $this->actions)) {
            throw new ForbiddenException();
        }
    }
}