<?php

namespace Engine\Service;

use Engine\DI\DI;

abstract class AbstractProvider
{
    /** Создать экземпляр абстрактного класса невозможнл, они несут себя описательный смысл, также они не
     * могут включать в себя реализаций
     */
    /**
     * $var \Engine\DI\DI
     */
    protected $di;

    /**
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();


}