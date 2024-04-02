<?php

namespace app\src\core\router;
class Response
{
    public function redirect($url)
    {
        header("Location: $url");
    }

    public function success_response($data, $message = "success")
    {
        http_response_code(200);
        echo json_encode([
            "data" => $data,
            "message" => $message,
            "time" => microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]
        ]);
    }

    public function error_response($data, $message = "failure")
    {
        http_response_code(400);
        echo json_encode([
            "data" => $data,
            "message" => $message,
            "time" => microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]
        ]);
    }
}