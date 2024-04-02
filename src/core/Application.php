<?php

namespace app\src\core;

use app\src\core\controller\BaseController;
use app\src\core\database\Database;
use app\src\core\router\Request;
use app\src\core\router\Response;
use app\src\core\router\Router;
use app\src\core\view\View;

class Application
{

    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?BaseController $controller = null;
    public Database $db;
    public View $view;
    public string $layout = 'main';

    public function __construct($rootDir, $config)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->view = new View();
    }

    public function set_cors()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Max-Age: 1000");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
        header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
        header('Content-Type: application/json');
    }

    public function run()
    {
        try {
            $this->set_cors();
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

}