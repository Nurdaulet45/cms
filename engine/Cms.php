<?php

namespace Engine;

class Cms
{
    /*"Qwerty\\Cms\\": "src/",*/

    /**
     * @var
     */
    private $di;

    /**
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     *  Run Cms
    */
    public function run()
    {
        print_r($this->di->get('test'));
        echo 'hello cms';

    }
}