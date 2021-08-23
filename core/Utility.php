<?php

namespace Core;

class Utility
{
    const PROJECT = "PHP_Project";

    // $perrmission = Manager
    // $controller = Application
    // $action = Add
    // $params = [21312, abc, xzy]
    private static function CreateLink($permission, $controller, $action = "Index", $params = [])
    {
        $link = "http://" . $_SERVER['HTTP_HOST'] . "/" . self::PROJECT . "/"
            . $permission . "/"
            . $controller . "/"
            . $action . "/";
        foreach ($params as $param) {
            $link = $link . $param . "/";
        }
        unset($param);
        return $link;
    }
    public static function Redirect($permission, $controller, $action = "Index", $params = [])
    {
        $link = self::CreateLink($permission, $controller, $action, $params);
        header("Location: " . $link);
    }

    // $alert = "cap nhat thanh cong"
    public static function AlertRedirect($alert, $permission, $controller, $action = "Index", $params = [])
    {
        $link = self::CreateLink($permission, $controller, $action, $params);
        echo '<script>alert("' . $alert . '");'
            .'location = "'.$link.'"'.'</script>';
    }
}
