<?php

namespace app\src\controller;

use app\src\core\controller\BaseController;
use app\src\core\router\Request;
use app\src\core\router\Response;
use app\src\middleware\AuthMiddleware;

class TestController extends BaseController
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['test_private']));
    }

    public function test_public(Request $request, Response $response)
    {
        return $response->success_response("Success");
    }


    public function test_private(Request $request, Response $response)
    {
        return $response->success_response("Success");
    }
}