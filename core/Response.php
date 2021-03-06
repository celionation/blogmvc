<?php

namespace core;

class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }

    public static function redirect($location)
    {
        if (!headers_sent()) {
            header('Location: ' . ROOT . $location);
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . ROOT . $location . '"';
            echo '</script>';
            echo '<nosript>';
            echo '<meta http-equiv="refresh" content="0;url=' . ROOT . $location . '" />';
            echo '</nosript>';
        }
        exit();
    }
}