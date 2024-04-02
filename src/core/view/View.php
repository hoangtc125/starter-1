<?php

namespace app\src\core\view;
use app\src\core\Application;

class View
{
    public string $title = '';

    public function renderView($view, array $params)
    {
        $layoutName = Application::$app->layout;
        if (Application::$app->controller) {
            $layoutName = Application::$app->controller->layout;
        }
        $viewContent = $this->renderViewOnly($view, $params);
        ob_start();
        include_once Application::$ROOT_DIR . "/src/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        header('Content-Type: text/html');
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/src/views/$view.php";
        header('Content-Type: text/html');
        return ob_get_clean();
    }
}