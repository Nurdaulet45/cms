<?php

namespace Engine;
use Engine\Helper\Common;

class Cms
{
    /*"Qwerty\\cms\\": "src/",*/

    /**
     * @var
     */
    private $di;
    private $router;

    /**
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     *  Run cms
    */
    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('news', '/news', 'HomeController:news');
        $this->router->add('product', '/user/12', 'ProductController:index');

//        echo Common::getMethod();
//        echo Common::getPathUrl();
        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

        list($class, $action) = explode(':', $routerDispatch->getController(),  2);
        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());
//        print_r($class);
//        echo '<br>';
//        print_r($action);
//        print_r($routerDispatch);
//        print_r($this->di);
//        print_r($_SERVER);
//        print_r($this->di);
//        echo 'hello cms';

    }
}