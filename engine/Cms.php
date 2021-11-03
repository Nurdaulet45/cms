<?php

namespace Engine;

class Cms
{
    /*"Qwerty\\Cms\\": "src/",*/

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
     *  Run Cms
    */
    public function run()
    {
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/product/{id}', 'ProductController:index');
        print_r($this->di);
//        print_r($this->di);
//        echo 'hello cms';

    }
}