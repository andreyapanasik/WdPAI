<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/TopicsController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/TopicController.php';

class Routing
{

    public static array $routers;

    public static function get($url, $controller)
    {
        self::$routers[$url] = $controller;
    }

    public static function post($url, $controller)
    {
        self::$routers[$url] = $controller;
    }

    public static function run($url)
    {

        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routers)) {
            die("Wrong url!");
        }

        $controller = self::$routers[$action];
        $object = new $controller;
        $action = $action ?: "index";
        $object->$action();

    }

}