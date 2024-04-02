<?php


namespace app\src\controller;

use app\src\adapter\AccountAdapter;
use app\src\core\controller\BaseController;
use app\src\core\router\Request;
use app\src\core\router\Response;
use app\src\middleware\AuthMiddleware;

class AccountController extends BaseController
{
    private AccountAdapter $accountAdapter;

    public function __construct()
    {
        $this->accountAdapter = new AccountAdapter();
    }

    public function get_account(Request $request, Response $response)
    {
        $res = $this->accountAdapter->get_one_by_username("hoang");
        return $response->success_response($res);
    }
}