<?php

namespace app\src\core\middleware;
abstract class BaseMiddleware
{
    abstract public function execute();
}